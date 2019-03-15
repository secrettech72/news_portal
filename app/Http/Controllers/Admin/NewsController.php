<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public $base_route = 'admin.news';
    public $panel = 'News';
    public function index(){
        $data['rows'] = News::select('news.id','news.title','news.description','news.news_images','news.status','category.title as stitle')
            ->join('category', 'category.id', '=', 'news.categories_id')
            ->get();
        return view($this->base_route.'.index',compact('data'));
    }
    public function create(){
        $select_category = Category::all()->pluck('title','id')->toArray();
        return view($this->base_route.'.add',compact('select_category'));
    }
    public function store(Request $request){
        if ($request->has('news_images')) {
            $file_name = 'news_images' . time() . rand(0, 999999) . $request->file('news_images')->getClientOriginalName();
            $folder_path = public_path(). DIRECTORY_SEPARATOR . 'Images' . DIRECTORY_SEPARATOR . 'News' . DIRECTORY_SEPARATOR;
            if (!is_dir($folder_path)) {
                $folder = mkdir($folder_path, 0777, true);
            }
            $request->file('news_images')->move($folder_path,$file_name);
        }
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'news_images' => isset($file_name)?$file_name:null,
            'categories_id' => $request->select_category,
            'status' => $request->status,
            'is_featured'=>1
        ]);
        $request->session()->flash('session','Success The '.$this->panel.' Has Been Added Successfully');
        return redirect()->route($this->base_route);
    }

    public function edit(Request $request,$id){
        $select_category = Category::all()->pluck('title','id')->toArray();

        if($data['row'] = News::find($id)){
            return view($this->base_route.'.edit',compact('data','select_category'));
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this->base_route);
        }
    }

    public function update(Request $request,$id){
        if(!$news = News::find($id)){
            $request->session()->flash('session','Sorry The '.$this->panel.' is not found');
            return redirect()->route($this->base_route);
        }
        $file_name = $news->news_images;
        $file = $request->file('news_images');
        if ($request->has('news_images') && $request->file('news_images') != '') {
            $file_name = 'news_images' . time() . rand(0, 999999) . $file->getClientOriginalName();
            $folder_path = public_path() . DIRECTORY_SEPARATOR . 'Images' . DIRECTORY_SEPARATOR . 'News'. DIRECTORY_SEPARATOR;
            if (!is_dir($folder_path)) {
                $folder = mkdir($folder_path, 0777, true);
            }
            if(file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$news->news_images)){
                unlink(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$news->news_images);
            }
            $file->move($folder_path,$file_name);
        }
        $news->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'news_images' => $file_name,
                'categories_id' => $request->select_category,
                'status' => $request->status,
                'is_featured'=>1
        ]);
        $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
        return redirect()->route($this->base_route);        
    }

    public function delete(Request $request,$id){
        if($data = News::find($id)){
            if($data->news_images!= "" && file_exists(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$data->news_images)){
                unlink(public_path().DIRECTORY_SEPARATOR.'Images'.DIRECTORY_SEPARATOR.'News'.DIRECTORY_SEPARATOR.$data->news_images);
            }
            $data->delete();
            $request->session()->flash('session','Success The '.$this->panel.'  Info Updated found');
            return redirect()->route($this->base_route);
        }else{
            $request->session()->flash('session','Sorry The '.$this->panel.'  Is Not In Database found');
            return redirect()->route($this->base_route);
        }
    }
}
