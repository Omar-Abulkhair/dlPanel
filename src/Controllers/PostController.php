<?php

namespace Dl\Panel\Controllers;

use \Dl\Panel\Models\Category;
use \Dl\Panel\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Dl\Panel\Libraries\Facades\Upload;
use Illuminate\Support\Facades\Route;

class PostController extends DlController
{

    public function index()
    {
        $posts=Post::with('category','author')->paginate(5);
        return view('Panel::dashboard.pages.posts.index')->withPosts($posts);
    }

    public function create()
    {

        $categories=Category::all();
        return view('Panel::dashboard.pages.posts.create')->withCategories($categories);
    }


    public function store(Request $request)
    {
        $rules=[
            'title'=>'required|min:3',
            'body'=>'required',
            'excerpt'=>'required',
            'slug'=>'unique:posts',
            'status'=>'required',
        ];
        if ($request->hasFile('image')) {
            $rules['image']='mimes:jpeg,jpg,png,gif|max:10000';
        }
        $validator = Validator::make($request->all(), $rules);
        $data=$request->all();
        $data['author_id']=Auth::id();
        if($validator->passes()){
            if ($request->hasFile('image')) {
                $image=Upload::put('/post',$request->image);
                if($image !=false){
                    $data['image']=$image;
                }else{
                    return response()->json(['status'=>false,'errors'=>['Image Upload Error']]);
                }
            }

        }else{
            return response()->json(['status'=>false,'errors'=>$validator->errors()]);
        }

        $post=Post::create($data);
        return response()->json(['status'=>true]);
    }


    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $post = Post::where('id', $post->id)->first();
        return view('Panel::dashboard.pages.posts.edit', compact('post', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:3',
            'body' => 'required',
            'excerpt' => 'required',
            'slug' => "unique:posts,slug,$request->data_id ",
            'status' => 'required',
        ];
        //required|unique:questions,slug,{$id}
        if ($request->hasFile('image')) {
            $rules['image'] = 'mimes:jpeg,jpg,png,gif|max:10000';
        }
        $validator = Validator::make($request->all(), $rules);
        $data = $request->except('_method','_token','data_id');
//        $data = $request->all();
        $data['author_id'] = Auth::id();
        if ($validator->passes()) {
            if ($request->hasFile('image')) {
                $image = Upload::put('/post', $request->image);
                if ($image != false) {
                    $data['image'] = $image;
                } else {
                    return response()->json(['status' => false, 'errors' => ['Image Upload Error']]);
                }
            }

        } else {
            return response()->json(['status' => false, 'errors' => $validator->errors()]);
        }
        $id  = $request->data_id;
        $post = Post::where('id', $id)->update($data);
        return response()->json(['status' => true]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('response',['status'=>true,'msg'=>'Deleted Successfully.']);

    }

}
