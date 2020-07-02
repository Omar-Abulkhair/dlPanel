<?php

namespace Dl\Panel\Controllers;

use Dl\Panel\Models\Category;
use Dl\Panel\Libraries\Facades\Upload;
use Illuminate\Http\Request;
use Validator;
use Storage;
use Intervention\Image;
class CategoryController extends DlController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $cats = Category::with('parent')->paginate(4);
        return view('Panel::dashboard.pages.categories.index')->withCats($cats);
    }


    public function create()
    {
        $cats = Category::all();
        return view('Panel::dashboard.pages.categories.create')->with('categories', $cats);
    }


    public function store(Request $request)
    {
        unset($request->_token);
        if ($request->parent_id == "NULL") {
            unset($request->parent_id);
        }
        $rules = [
            'name' => 'required',
            'color' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            $data = $request->all();
            if ($request->hasFile('image')) {

                $image=Upload::put('/categories',$request->image);
                if($image !=false){
                    $data['image']=$image;
                }

            }
        }


        if ($request->parent_id == "NULL") {
            unset($data['parent_id']);
            $cat = Category::create($data);
        } else {
            $cat = Category::create($data);
        }

        return redirect()->route('dashboard.categories.index')->with('success', true);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $id = $category->id;
        $category = Category::with('parent')->findOrFail($id);
        $cats = Category::all();
        return view('Panel::dashboard.pages.categories.edit')->with('categories', $cats)->withCategory($category);
    }


    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required',
            'color' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ];
        $data = $request->except('_token', '_method');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $name = "Image_" . date("Y-m-d_H:i:s_") . 'u_' . Auth()->id() . "." . $extension;
                $upload = Storage::disk('categories_images')->put($name, file_get_contents($file->getRealPath()));
                if ($upload) {
                    $data['image'] = $name;
                }
            }
        }
        if ($request->parent_id == "NULL") {
            $data['parent_id'] = null;
            $cat = Category::where('id', $category->id)->update($data);

        }
        $cat = Category::where('id', $category->id)->update($data);
        return redirect()->route('dashboard.categories.index')->with('success', true);
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

}
