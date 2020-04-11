<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
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

Route::any('weixin/{id?}','WeixinController@index');

// 前台不需要中间件的页面
Route::group(['namespace'=>'qiantai'],function(){
    Route::get('/', 'IndexController@index');
    Route::get("/page_{id}.html","IndexController@page");
    Route::get("/list_{id}.html","IndexController@list");
    Route::get("/article_{id}.html","ArticleController@article");
    Route::any('/login/{url?}',['as' => 'userlogin', 'uses' => 'IndexController@login']);
    Route::any('/register',"IndexController@register");
    Route::get('/logout/{url?}',['as' => 'userlogout', 'uses' => 'IndexController@logout']);
    Route::get('/jump{message?}',['as'=>'jump','uses'=>'IndexController@jump']);
    Route::get('/vip','IndexController@vip');
    Route::any('/tags/{tag}','IndexController@tags');
    Route::any('/search', 'IndexController@search');
    Route::get('/guestbook',"IndexController@guestbook");
});

// 前台需要中间件的页面
Route::group(['middleware'=>'CheckUser'],function(){
    // Route::any('search', 'qiantai\IndexController@search');
    Route::group(['prefix'=>"member",'namespace'=>'qiantai'],function(){
        Route::get('/',"MemberController@index");
        Route::any('editinfo',"MemberController@editinfo");
        Route::any('editsafeinfo',"MemberController@editsafeinfo");
        Route::get('buygroup',"MemberController@buygroup");
        Route::get('buylist',"MemberController@buylist");
        
        Route::get('coinlog',"MemberController@coinlog");

        Route::get('msg',"MemberController@msg");
        Route::get('msg/del/{id}',"MemberController@del");
        Route::get('msg/read/{id}',"MemberController@read");
        Route::get("download/{id}","ArticleController@download");
        Route::get("downok/{id}","ArticleController@downok");
        Route::get("downloadusecoin/{id}",'ArticleController@downloadusecoin');
        Route::get("downokusecoin/{id}",'ArticleController@downokusecoin');
        // 发表评论路由
        // Route::post('comments', 'CommentsController@index');
        Route::post('comments/store', 'CommentsController@store');
        Route::post('guestbook/store',"GuestbookController@store");
        //回复资源路由
        Route::post('replys','ReplysController@index');
    });
});


// 后台需要的api路由
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    // 获取栏目列表api
    Route::get('api/categories',function(){
        $arr = App\Models\Category::all()->toArray();
        $res = [];
        foreach($arr as $k=>$v){
            $res[$k]['id']=$v['id'];
            $res[$k]['text'] = $v['title'];
        }
        return ($res);
    })->name('admin.getcategories');
    // 获取用户列表api
    Route::get('api/getusers',function(){
        $arr = App\Models\User::all()->toArray();
        $res = [];
        foreach($arr as $k=>$v){
            $res[$k]['id']=$v['id'];
            $res[$k]['text'] = $v['username'];
        }
        return ($res);
    });
    // 获取用户角色列表api
    Route::get('api/getuserroles',function(){
        $arr = App\Models\userrole::all()->toArray();
        $res = [];
        foreach($arr as $k=>$v){
            $res[$k]['id']=$v['id'];
            $res[$k]['text'] = $v['title'];
        }
        return ($res);
    });
    // 获取微信列表api
    Route::get('api/getweixins',function(){
        $arr = App\Models\Weixin::all()->toArray();
        $res = [];
        foreach($arr as $k=>$v){
            $res[$k]['id']=$v['id'];
            $res[$k]['text'] = $v['weixintitle'];
        }
        return ($res);
    });
    // 用户角色userroles
    Route::get('api/userroles',function(){
        $arr = App\Models\Userrole::all()->toArray();
        $res = [];
        foreach($arr as $k=>$v){
            $res[$k]['id'] = $v['id'];
            $res[$k]['text'] = $v['title'];
        }
        // dd($res);
        return ($res);
    });
    Route::get('api/getCategoryNeedcoin','ArticleController@getCategoryNeedcoin');

   

    Route::get('test',function(){
        dd(trans());
    });
});

