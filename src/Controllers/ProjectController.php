<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Libraries\Facades\Upload;
use Dl\Panel\Models\Project;
use Dl\Panel\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class ProjectController extends DlController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::paginate(5);
        return view('Panel::dashboard.pages.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties=Specialty::all();
        return view('Panel::dashboard.pages.projects.create',compact('specialties'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|min:3',
            'body'=>'required',
            'specialty_id'=>'required',
        ];
        if ($request->hasFile('image')) {
            $rules['image']='mimes:jpeg,jpg,png,gif|max:10000';
        }
        $validator = Validator::make($request->all(), $rules);
        $data=$request->all();
        $data['author_id']=Auth::id();
        if($validator->passes()){
            if ($request->hasFile('image')) {
                $image=Upload::put('/project',$request->image);
                if($image !=false){
                    $data['image']=$image;
                }else{
                    return redirect()->route('dashboard.projects.index')->with('response',['status'=>false,'msg'=>'Image Error.']);
                }
            }

        }else{
            return redirect()->route('dashboard.projects.index')->with('response',['status'=>false])->withErrors($validator);
        }

        $project =Project::create($data);
        return redirect()->route('dashboard.projects.index')->with('response',['status'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $specialties=Specialty::all();
        return view('Panel::dashboard.pages.projects.edit',compact('project','specialties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules=[
            'title'=>'required|min:3',
            'body'=>'required',
            'specialty_id'=>'required',
        ];
        if ($request->hasFile('image')) {
            $rules['image']='mimes:jpeg,jpg,png,gif|max:10000';
        }
        $validator = Validator::make($request->all(), $rules);
        $data=$request->all();
        $data['author_id']=Auth::id();
        if($validator->passes()){
            if ($request->hasFile('image')) {
                $image=Upload::put('/project',$request->image);
                if($image !=false){
                    $data['image']=$image;
                }else{
                    return redirect()->route('dashboard.projects.index')->with('response',['status'=>false,'msg'=>'Image Error.']);
                }
            }

        }else{
            return redirect()->route('dashboard.projects.index')->with('response',['status'=>false])->withErrors($validator);
        }

        $project->update($data);
        return redirect()->route('dashboard.projects.index')->with('response',['status'=>true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('dashboard.projects.index')->with('response',['status'=>true,'msg'=>'Deleted Successfully.']);
    }
}
