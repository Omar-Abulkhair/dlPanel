<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Rules\MatchOldPassword;
use Dl\Panel\Models\User;
use Validator;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends DlController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Panel::dashboard.pages.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $user = Auth::user();
        $user->socialMedia = json_decode($user->socialMedia);
        return view('Panel::dashboard.pages.profile.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $newRequest = \Illuminate\Http\Request::capture();
        $newRequest->replace($request->except(['type']));
        //TODO :: Check that type in array
        if (!isset($request->type)) {
            return ['status' => false, 'msg' => 'Hacking Try'];
        }
        if ($request->type == "general") {
            $id = Auth::id();
            $rules = [
                'username' => 'unique:users,username,' . $id . '|required',
                'name' => 'required',
                'email' => 'unique:users,email,' . $id . '|required|email',
            ];
            $validator = Validator::make($newRequest->all(), $rules);
            if ($validator->fails()) {
                $failed = $validator->failed();
                return ['status' => false, 'msg' => $failed];
            } else {
                $user = User::find($id);

                if ($user->update($newRequest->all())) {
                    return ['status' => true];
                } else {
                    return ['status' => false, 'msg' => "Some Thing Wrong"];
                }
            }
        } else if ($request->type == "password") {
            $id = Auth::id();
            $rules = [
                'old' => ['required', new MatchOldPassword],
                'password' => 'required',
                'con-password' => 'same:password',
            ];
            $validator = Validator::make($newRequest->all(), $rules);
            if ($validator->fails()) {
                $failed = $validator->failed();
                return ['status' => false, 'msg' => $failed];
            } else {
                if (User::find(auth()->user()->id)->update(['password' => Hash::make($newRequest->password)])) {
                    return ['status' => true];
                } else {
                    return ['status' => false, 'msg' => "Some Thing Wrong"];
                }

            }
        } else if ($request->type == "info") {
            $rules = [
                'about' => 'required',
                'birthday' => 'required',

                'phone' => 'required',
                'website' => 'required',
            ];
            $validator = Validator::make($newRequest->all(), $rules);
            if ($validator->fails()) {
                $failed = $validator->failed();
                return ['status' => false, 'msg' => $failed];
            } else {
                User::find(auth()->user()->id)->update($newRequest->all());
                return ['status' => true];
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    # My Code

    public function updateGeneral()
    {
        return "Wow";
    }
}
