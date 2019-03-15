<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public $base_route = 'admin.comment';
    public $panel = 'Comments';
    public function index(){
        $data['rows'] = Comment::all();
        return view($this->base_route.'.index',compact('data'));
    }
    public function create(){
        return view($this->base_route.'.add');
    }
    public function store(Request $request){
        Comment::create([
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
        if($data['row'] = Comment::find($id)){
            return view($this->base_route.'.edit',compact('data'));
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this->base_route);
        }
    }

    public function update(Request $request,$id){
        if($category = Comment::find($id)){
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
        if($data = Comment::find($id)){
            $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
            return redirect()->route($this->base_route);
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.'  Is Not In Database found');
            return redirect()->route($this->base_route);
        }
    }
}
