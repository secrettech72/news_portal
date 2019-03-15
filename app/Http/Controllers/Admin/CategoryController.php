<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public $base_route = 'admin.category';
    public $panel = 'Category';
    public function index(){
        $data['rows'] = Category::all();
        return view($this->base_route.'.index',compact('data'));
    }
    public function create(){
        return view($this->base_route.'.add');
    }
    public function store(Request $request){
        if ($request->has('category_images')) {
            $file_name = 'category_images' . time() . rand(0, 999999) . $request->file('category_images')->getClientOriginalName();
            $folder_path = public_path(). DIRECTORY_SEPARATOR . 'Images' . DIRECTORY_SEPARATOR . 'Category' . DIRECTORY_SEPARATOR;
            if (!is_dir($folder_path)) {
                $folder = mkdir($folder_path, 0777, true);
            }
            $request->file('category_images')->move($folder_path,$file_name);
        }
        Category::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'description' => $request->description,
            'category_images' => isset($file_name)?$file_name:null,
            'status' => $request->status,
        ]);
        $request->session()->flash('session','Success The '.$this->panel.' Has Been Added Successfully');
        return redirect()->route($this->base_route);
    }

    public function edit(Request $request,$id){
        if($data['row'] = Category::find($id)){
            return view($this->base_route.'.edit',compact('data'));
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this->base_route);
        }
    }

    public function update(Request $request,$id){
        if($category = Category::find($id)){
            $file_name = $category->category_images;
            if ($request->has('category_images')) {
                $file_name = 'category_images' . time() . rand(0, 999999) . $request->file('category_images')->getClientOriginalName();
                $folder_path = public_path(). DIRECTORY_SEPARATOR . 'Images' . DIRECTORY_SEPARATOR . 'Category' . DIRECTORY_SEPARATOR;
                if (!is_dir($folder_path)) {
                    $folder = mkdir($folder_path, 0777, true);
                }
                if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$category->category_images)){
                    unlink(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$category->category_images);
                }
                $request->file('category_images')->move($folder_path,$file_name);
            }
            $category->update([
                'title' => $request->title,
                'slug' => str_slug($request->title),
                'description' => $request->description,
                'category_images' =>$file_name,
                'status' => $request->status,
            ]);
            $request->session()->flash('session','Success The '.$this->panel.' Has Been Added Successfully');
            return redirect()->route($this->base_route);
        }
        $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
        return redirect()->route($this->base_route);

    }

    public function delete(Request $request,$id){
        if($data = Category::find($id)){
            if($data->category_images!= "" && file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$data->category_images)){
                unlink(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'Category'.DIRECTORY_SEPARATOR.$data->category_images);
            }
            $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
            return redirect()->route($this->base_route);
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.'  Is Not In Database found');
            return redirect()->route($this->base_route);
        }
    }
}
