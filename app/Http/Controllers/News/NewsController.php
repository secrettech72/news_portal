<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public $base_route = 'news';
    public function index(){
        $all_categories = Category::all();
        $featured_news = News::select('news.id','news.title','news.description','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
            ->join('category','category.id','=','news.categories_id')
            ->get();
        $all_news = News::where('status',1)->get();
        return view('news.index',compact(['featured_news','all_news','all_categories']));
    }

    public function category(Request $request,$slug){
        $all_categories = Category::all();
        $featured_news = News::select('news.id','news.title','news.description','news.created_at','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
        ->join('category','category.id','=','news.categories_id')
        ->get();
        $all_details = News::select('news.id','news.title','news.description','news.created_at','news.news_images','categories_id','category.slug as c_slug','category.title as titles')
            ->join('category','category.id','=','news.categories_id')
            ->where('category.slug',$slug)
            ->get();
        $c_id = '';
        $comments='';

        if($all_details->count() > 0){
            $c_id = $all_details[0]->id;
            $comments = Comment::where('news_id',$c_id)->get();
            if($comments->count() > 0){
                $c_name = User::where('id',$comments[0]->id);
            }
        }

        return view('news.category',compact(['all_categories','featured_news','all_details','comments','c_name']));
    }
    public function full_news(Request $request,$id){
        $all_categories = Category::all();
        $featured_news = News::select('news.id','news.title','news.description','news.created_at','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
            ->join('category','category.id','=','news.categories_id')
            ->get();
        $full_news = News::where('id',$id)->get();
        $comments='';
        if($full_news->count() > 0){
            $c_id = $full_news[0]->id;
            $comments = Comment::where('news_id',$c_id)->get();
            if($comments->count() > 0){
                $c_name = User::where('id',$comments[0]->id);
            }
        }
        return view('news.full_news',compact(['all_categories','featured_news','full_news','comments','c_name']));
    }

    public function comments(Request $request){
        if(auth()->check()){
            Comment::create([
                'comments'=>$request->comments,
                'users_id'=>auth()->check()?auth()->user()->id :5,
                'news_id'=>$request->news_id,
                'status'=>1
            ]);
            $request->session()->flash('session','Success Your Comments Is Published');
            return redirect()->back();
        }else{
            $request->session()->flash('session','Sorry Please Login To Comment Your Comments Is Published');
            return redirect()->route('login');
        }
    }
}
