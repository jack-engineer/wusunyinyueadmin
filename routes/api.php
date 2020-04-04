<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// 获取栏目列表api
Route::get('categories',function(){
    $arr = App\Models\Category::all()->toArray();
    $res = [];
    foreach($arr as $k=>$v){
        $res[$k]['id']=$v['id'];
        $res[$k]['text'] = $v['title'];
    }
    return ($res);
});
