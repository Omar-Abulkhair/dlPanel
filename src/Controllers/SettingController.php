<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\Setting;
use Illuminate\Http\Request;
use Validator;
class SettingController extends DlController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Setting::Tags();
        dd($tags);
        return view('Panel::dashboard.pages.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Setting::Tags();
        $types=['image','text','boolean','date'];
        return view('Panel::dashboard.pages.settings.create')->withTags($tags)->withTypes($types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $types=['image',1];
        $rules=[
            "key"=>"required|unique:settings",
            'type'=>"required|in:".implode(',',$types),
            'tag'=>"required",
            //'options'=>"json",
        ];
        $validator = Validator::make($request->all(), $rules);
        $data=$request->all();
        if ($validator->passes()){
            $input=Setting::create($data);
            return redirect()->route('dashboard.settings.index')->with('response',['status'=>true,'msg'=>"Added Successfully"]);
        }
        dd($validator->errors());
        return redirect()->route('dashboard.settings.index')->with('response',['status'=>false,'errors'=>$validator]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
