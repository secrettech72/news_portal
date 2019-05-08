<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('admin/login',[
    'as'=>'admin.login',
    'uses'=>'Auth\LoginController@showLoginForm'
]);

Route::get('news/category/{slug}',[
    'as'=>'news.category',
    'uses'=>'News\NewsController@category'
]);

Route::get('news/register',function (){
    return view('news.login');
})->name('news.register');

Route::post('news/register/store',[
    'as'=>'news.register.store',
    'uses'=>'Admin\UserController@store'
]);


Route::get('news/full_news/{id}',[
    'as'=>'news.full_news',
    'uses'=>'News\NewsController@full_news'
]);

Route::post('hello');

Route::get('news',[
    'as'=>'news',
    'uses'=>'News\NewsController@index'
]);



Route::post('comments/store',[
    'as'=>'comments.store',
    'uses'=>'News\NewsController@comments'
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('dashboard',[
        'as'=>'admin.dashboard',
        'uses'=>'Admin\DashboardController@index'
    ]);
    Route::get('user',[
        'as'=>'admin.user',
        'uses'=>'Admin\UserController@index'
    ]);
    Route::get('user/create',[
        'as'=>'admin.user.add',
        'uses'=>'Admin\UserController@create'
    ]);
    Route::post('user/store',[
        'as'=>'admin.user.store',
        'uses'=>'Admin\UserController@store'
    ]);
    Route::get('user/edit/{id}',[
        'as'=>'admin.user.edit',
        'uses'=>'Admin\UserController@edit'
    ]);
    Route::post('user/update/{id}',[
        'as'=>'admin.user.update',
        'uses'=>'Admin\UserController@update'
    ]);
    Route::get('user/delete/{id}',[
        'as'=>'admin.user.delete',
        'uses'=>'Admin\UserController@delete'
    ]);

    //News
    Route::get('news',[
        'as'=>'admin.news',
        'uses'=>'Admin\NewsController@index'
    ]);
    Route::get('news/create',[
        'as'=>'admin.news.add',
        'uses'=>'Admin\NewsController@create'
    ]);
    Route::post('news/store',[
        'as'=>'admin.news.store',
        'uses'=>'Admin\NewsController@store'
    ]);
    Route::get('news/edit/{id}',[
        'as'=>'admin.news.edit',
        'uses'=>'Admin\NewsController@edit'
    ]);
    Route::post('news/update/{id}',[
        'as'=>'admin.news.update',
        'uses'=>'Admin\NewsController@update'
    ]);
    Route::get('news/delete/{id}',[
        'as'=>'admin.news.delete',
        'uses'=>'Admin\NewsController@delete'
    ]);

    //Category
    Route::get('category',[
        'as'=>'admin.category',
        'uses'=>'Admin\CategoryController@index'
    ]);
    Route::get('category/create',[
        'as'=>'admin.category.add',
        'uses'=>'Admin\CategoryController@create'
    ]);
    Route::post('category/store',[
        'as'=>'admin.category.store',
        'uses'=>'Admin\CategoryController@store'
    ]);
    Route::get('category/edit/{id}',[
        'as'=>'admin.category.edit',
        'uses'=>'Admin\CategoryController@edit'
    ]);
    Route::post('category/update/{id}',[
        'as'=>'admin.category.update',
        'uses'=>'Admin\CategoryController@update'
    ]);
    Route::get('category/delete/{id}',[
        'as'=>'admin.category.delete',
        'uses'=>'Admin\CategoryController@delete'
    ]);

    //News
    Route::get('comment',[
        'as'=>'admin.comment',
        'uses'=>'Admin\CommentController@index'
    ]);
    Route::get('comment/create',[
        'as'=>'admin.comment.add',
        'uses'=>'Admin\CommentController@create'
    ]);
    Route::post('comment/store',[
        'as'=>'admin.comment.store',
        'uses'=>'Admin\CommentController@store'
    ]);
    Route::get('comment/edit/{id}',[
        'as'=>'admin.comment.edit',
        'uses'=>'Admin\CommentController@edit'
    ]);
    Route::post('comment/update/{id}',[
        'as'=>'admin.comment.update',
        'uses'=>'Admin\CommentController@update'
    ]);
    Route::get('comment/delete/{id}',[
        'as'=>'admin.comment.delete',
        'uses'=>'Admin\CommentController@delete'
    ]);
});

