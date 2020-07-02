<?php


namespace Dl\Panel\Controllers;

use Dl\Panel\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Spatie\Permission\Models\Role;
use Validator;
use Hash;
use Redirect;

class AuthController extends DlController
{
    public function showLoginForm(){
        return view('Panel::auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials,$request->remember)) {
            $user=User::findOrfail(\auth()->id());
            $user->update(['lastLogin'=>now()]);
            return redirect()->route('dashboard.home')->withNotify(['status'=>true,'message'=>"Success Login"]);
        }
    }

    public function showRegistrationForm(){
        return view('Panel::auth.register');
    }


    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:1',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:6|confirmed'
        ]);

        if($validator->passes()){
            $data=$request->only(['name','email','password']);
            $data['password']=Hash::make($data['password']);
            $user=\App\User::create($data);
            $user->assignRole(config('auth.defaults.role'));
            \auth()->login($user);
            $user->update(['lastLogin'=>now()]);
            return redirect()->route('dashboard')->withNotify(['status'=>true,'message'=>"Success Login"]);
        }else{
            return redirect()->back()->withNotify(['status'=>false,'errors'=>$validator->errors()->all()]);
        }

    }


    protected function authenticated(Request $request, $user)
    {
        //Check user role, if it is not admin then logout
        if($user->hasRole(['user']))
        {
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('/login')->withNotify(['status'=>false,'errors'=>['You are unauthorized to login']]);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return back();
    }

}
//$user->hasRole('writer');
