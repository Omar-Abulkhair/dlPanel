<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\Specialty;
use Illuminate\Http\Request;
use Validator;
class SpecialtyController extends DlController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties=Specialty::paginate(5);
        return view('Panel::dashboard.pages.specialties.index')->withSpecialties($specialties);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Panel::dashboard.pages.specialties.create');
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
            'name'=>'required|min:3',
            'color'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()){
            if (Specialty::create($request->all())){
                return redirect()->route('dashboard.specialties.index')->with('response',['status'=>true,'msg'=>'Add Successfully.']);
            }else{
                return redirect()->back()->with('response',['status'=>false,'msg'=>'DB Error']);
            }
        }else{
            return redirect()->back()->with('response',['status'=>false,'msg'=>'Error.'])->withErrors();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(specialty $specialty)
    {
        return view('Panel::dashboard.pages.specialties.edit',compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, specialty $specialty)
    {
        $specialty->update($request->all());
        return redirect()->route('dashboard.specialties.index')->with('response',['status'=>true,'msg'=>'Updated Successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(specialty $specialty)
    {
        $specialty->delete();
        return redirect()->route('dashboard.specialties.index')->with('response',['status'=>true,'msg'=>'Deleted Successfully.']);

    }
}
