<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\Todo;
use Illuminate\Http\Request;
use Validator;
class TodoController extends DlController
{

    public function index()
    {
        $data=[];
        $data['todo']=Todo::where('user_id',auth()->id())->get();
        return view('Panel::dashboard.pages.todo.index',$data);
    }


    public function store(Request $request)
    {
        if ($request->parent_id=="NULL"){
            $request->parent_id=null;
        }
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $todo=new Todo();
            $task=$todo->create([
                'name'=>$request->name,
                'description'=>$request->description,
                'user_id'=>auth()->user()->id,
                'parent_id'=>$request->parent_id,
            ]);


            return response()->json([
                'status'=>true,
                'id'=>$task->id,
                'data_status_route'=>route('dashboard.todo.status',$task->id),
                'data_delete_route'=>route('dashboard.todo.destroy',$task->id),
                'data_update_route'=>route('dashboard.todo.update',$task->id),
                'data_parent_id'=>$task->parent_id,
            ]);
        }

        return response()->json(['status'=>false,'errors'=>$validator->errors()->all()]);

    }


    public function update(Request $request, $id)
    {

        if ($request->parent_id=="NULL"){
            $request->parent_id=null;
        }
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            $todo=Todo::find($id);
            $todo->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'parent_id'=>$request->parent_id
            ]);
            if ($todo->save()){
                return response()->json(['status'=>true]);
            }else{
                return response()->json(['status'=>false,'errors'=>"DB ERROR"]);
            }

        }

        return response()->json(['status'=>false,'errors'=>$validator->errors()->all()]);
    }

    public function destroy(Todo $todo)
    {
        $task=Todo::find($todo->id);
        if($task->user_id==auth()->id()){
            if($task->delete()){
                return response()->json(['status'=>true]);
            }
            return response()->json(['status'=>false,'msg'=>'Sorry some thing wrong']);
        }
        return response()->json(['status'=>false,'msg'=>'You Cannot Hack this']);

    }

    public function toggleState ($id){
        $task=Todo::find($id);
        if($task->user_id!=auth()->id()){
            return response()->json(['status'=>false,'msg'=>"Auth Error"]);
        }else{
            $task->is_checked=!$task->is_checked;
            if($task->save()){
                return response()->json(['status'=>true]);
            }
        }
        return response()->json(['status'=>false,'msg'=>"DB Error"]);
    }
}
