<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Libraries\Facades\Upload;
use Dl\Panel\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Validator;

class SettingController extends DlController
{

    public function index()
    {
        $tags = Setting::Tags();
        $settings = [];
        foreach ($tags as $tag) {
            $settings[$tag] = Setting::where('tag', $tag)->get();
        }
        return view('Panel::dashboard.pages.settings.index')->withSettings($settings);
    }


    public function create()
    {
        $tags = Setting::Tags();
        $types = ['image', 'text', 'boolean', 'date'];
        return view('Panel::dashboard.pages.settings.create')->withTags($tags)->withTypes($types);
    }


    public function store(Request $request)
    {
        $types = ['image','text','boolean'];
        $rules = [
            "key" => "required|unique:settings",
            'type' => "required|in:" . implode(',', $types),
            'tag' => "required",
        ];
        $validator = Validator::make($request->all(), $rules);
        $data = $request->all();
        if ($validator->passes()) {
            $input = Setting::create($data);
            return redirect()->route('dashboard.settings.index')->with('response', ['status' => true, 'msg' => "Added Successfully"]);
        }
        dd($validator->errors());
        return redirect()->route('dashboard.settings.index')->with('response', ['status' => false, 'errors' => $validator]);
    }


    public function show(Setting $setting)
    {
        //
    }


    public function edit(Setting $setting)
    {
        //
    }


    public function update(Request $request, Setting $setting)
    {
        $type = $setting->getOriginal()['type'];
        $data['tag']=(!empty($request->tag)) ? $request->tag : "general";
        if ($type == "image") {
            if ($request->hasFile('image')) {
                $data['value']=Upload::put('/settings',$request->image);

            }
            $setting->update($data);
            return redirect()->route('dashboard.settings.index')->with('response',['status'=>true]);
        }

        if ($type == "text") {
            $data['value']=$request->value;
            $setting->update($data);
            return redirect()->route('dashboard.settings.index')->with('response',['status'=>true]);
        }


        if ($type == "boolean") {
            $data['value'] = $request->value;
            $setting->update($data);
            return redirect()->route('dashboard.settings.index')->with('response', ['status' => true]);
        }




    }

    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect()->back();
    }
}
