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
    });
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
    Route::get('api/getCategoryNeedcoin','ArticleController@getCategoryNeedcoin');

    Route::get('test',function(){
        dd(trans());
    });
});

