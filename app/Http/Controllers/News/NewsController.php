<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class NewsController extends Controller
{
    public $base_route = 'news';
    public function index(){
        /*$users = User::all();
        foreach ($users as $key => $user) {
            foreach ($user->notifications as $key => $notes) {
                $news = DB::table('news')->where('id',$notes->data['letter']['id'])->first();
                dump($news); //id has been send of news
            }
        } 
        dd('finished');*/
        $all_categories = Category::all();
        $latest_news =News::select('news.id','news.title','news.description','news.news_images','categories_id','category.title as titles')
        ->orderBy('id','desc')
        ->join('category','category.id','=','news.categories_id')
        ->get();  
        $top_news = News::select('news.id','news.title','news.description','news.news_images','categories_id','category.title as titles')
        ->orderBy('id','desc')
        ->join('category','category.id','=','news.categories_id')
        ->get();

        $top_news_internations = News::select('news.id','news.title','news.description','news.news_images','categories_id','category.title as titles')
        ->orderBy('id','desc')
        ->where('news.categories_id',6)
        ->join('category','category.id','=','news.categories_id')
        ->get();

        $featured_news = News::select('news.id','news.title','news.description','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
            ->join('category','category.id','=','news.categories_id')
            ->get();
        $all_news = News::where('status',1)->get();
        $popular_news = News::where('is_clicked','>',0)
        ->orderBy('is_clicked','desc')
        ->limit(4)
        ->get();
        return view('news.index',compact(['featured_news','popular_news','all_news','all_categories','latest_news','top_news','top_news_internations',]));
    }

    public function search(Request $request){
        $query = $request['query'];
        $data = DB::table('news')->where('title', 'LIKE',  '%' . $query.'%')->get();
         $response['html']  = '<ul class="dropdown-menu search_list"style="display:block;position:relative;">';
        foreach($data as $search){
             $response['html'] .='<li><a href="javascript:void(0)"><p style="color:green">'.$search->title.'</p></a></li>';
       }
        $response['html'] .="</ul>";
       return response()->json(json_encode($response));
    }

    public function search_result(Request $request){
       
        $all_categories = Category::all();
        if($news = News::all()){
            foreach ($news as $key => $ns) {
                if($ns->title == $request->search){
                return redirect()->route('news.full_news',$ns->id);                    
                }
            }
            $data = News::where('title','LIKE','%'.$request->search.'%')->get();
            return view('news.search_result',compact(['data','all_categories']));
        }
    }

    public function likes(Request $request){
        $response['error'] = true;
        if($news=News::find($request->id)){
            DB::table('news')->where('id',$news->id)->update(['likes'=>$news->likes+1]);
            $response['success']='Success Your Likes Is Has Been Posted Live';
            $all_details = News::select('news.id','news.title','news.description','news.likes','news.created_at','news.news_images','categories_id','category.slug as c_slug','category.title as titles')
            ->join('category','category.id','=','news.categories_id')
            ->where('category.slug',$request->get('titles'))
            ->get();
            $response['html'] = view('news.common.reviews',compact('all_details'))->render();
            $response['error'] = false;
        }else{
            $response['success'] = 'Sorry The News Is Not Found ';
        }
        return response()->json(json_encode($response)); 
    }

    public function category(Request $request,$slug){
        $all_categories = Category::all();
        $featured_news = News::select('news.id','news.title','news.description','news.created_at','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
        ->join('category','category.id','=','news.categories_id')
        ->get();
        $all_details = News::select('news.id','news.title','news.description','news.likes','news.created_at','news.news_images','categories_id','category.slug as c_slug','category.title as titles')
            ->join('category','category.id','=','news.categories_id')
            ->where('category.slug',$slug)
            ->get();
        return view('news.category',compact(['all_categories','featured_news','all_details']));
    }
    public function full_news(Request $request,$id){
        $all_categories = Category::all();
        $featured_news = News::select('news.id','news.title','news.description','news.created_at','news.news_images','categories_id','category.title as titles')->orderBy('news.id','desc')
            ->join('category','category.id','=','news.categories_id')
            ->get();
        $full_news = News::where('id',$id)->get();
        $comments = Comment::where('news_id',$id)->get();
        if(auth()->check()){
            foreach (auth()->user()->notifications as $key => $value) {
                if($value->data['letter']['id'] == $request->id){
                    $value->markAsRead();
                }
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
            $request->session()->flash('session','Sorry Please Login To Comment');
            return redirect()->route('login');
        }
    }
}
