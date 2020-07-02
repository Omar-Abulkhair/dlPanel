<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\User;
use Illuminate\Http\Request;
use Route;
use Spatie\Permission\Models\Role;
use Validator;
class UserController extends DlController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('roles')->paginate(2);
        return view('Panel::dashboard.pages.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view('Panel::dashboard.pages.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('role_id');
        $rules = [
            'password' => 'required|min:6|confirmed',
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'username'=>'required|unique:users'
        ];
        $data=$request->except(['role_id','password_confirmation']);
        $data['password']=bcrypt($data['password']);
        $validator=Validator::make($data,$rules);
        $user=User::create($data);
        if($user){
            $user->assignRole([$request->role_id]);
        }else{

        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);

        $roles=Role::all();
        return view('Panel::dashboard.pages.users.edit')->withUser($user)->withRoles($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data=$request->except('role_id');
        $rules = [
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'username'=>'required|unique:users'
        ];
        if($request->has('password')){
            $rules['password']='required|min:6|confirmed';
        }
        $validator=Validator::make($data,$rules);
        if($request->has('password')){
            $data=$request->except(['role_id','password_confirmation']);
            $data['password']=bcrypt($data['password']);
        }
        $user->update($data);
        $user->syncRoles([$request->role_id]);
        if($user){
            return redirect()->back();
        }else{

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    /**
     * Ajax Functions
     **/
/*    public function datatable()
    {
        $users=User::with('role')->all(['name','avatar','email','id','active','lastLogin']);
        return Datatables::of($users)->make(true);
    }*/
}
