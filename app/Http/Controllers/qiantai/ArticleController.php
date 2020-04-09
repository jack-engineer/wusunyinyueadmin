<?php

namespace App\Http\Controllers\qiantai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class ArticleController extends Controller
{
    public $menus;
    public $xiaoxi = false;
    public function __construct(){
        // 只能游客访问的页面，也就是登录之后不能访问的方法
        $this->middleware('guest')->only(['register','login']);
        $this->menus = Menu::get();
        view()->share('menus',$this->menus);
    }
    //
    public function article($id){
        $article = Article::findorFail($id); //如果找不到，则报404
        $article->hits+=1;
        $article->save();
        if(empty($article)){
            abort(404);
        }
        $menu = Menu::where("type_id",'=',$article->category_id)->first();
        // 上一篇，下一篇
        $up = Article::where("id",'<',$id)->where("category_id",$article->category_id)->orderBy('id','desc')->first();
        $down = Article::where("id",">",$id)->where("category_id",$article->category_id)->first();
        
        // 猜你喜欢
        $cainixihuan = $this->getTenMusics($article->author);
        
        $flag = false;
        
        if(Auth::guard('web')->check()){
            $flag = $this->kanwenzhang(Auth::guard('web')->user(),$article);
        }
        
        if($flag){
            $dd = $article->increment('hits');
        }

        // 精彩评论
        $jingcaipinglun = $article->comments()->where('status','1')->orderBy('id','desc')->limit(30)->get();
        
        return view('qiantai/article',['menu'=>$menu,'article'=>$article,'up'=>$up,'down'=>$down,'cainixihuan'=>$cainixihuan,'flag'=>$flag,'jingcaipinglun'=>$jingcaipinglun]);
    }

    // 根据会员id，文章实例，判断是否有看文章的权限，返回true/false
    public function kanwenzhang($user,$article){
        $userrole_id = $user->userrole_id??'1';
        
        // 如果会员没有过期，或者长期有效
        $status = (Auth::guard('web')->user()->expiration_date > date('Y-m-d H:i:s',strtotime('-1 day'))) || empty($user->expiration_date);
        if($status){
            // 只要权限大于等于文章权限，就可以下载
            return ($userrole_id >= $article->userole_id);
        }else{
            // 只要会员过期，抱歉，只能下载青铜的
            return $article->userrole_id==1?true:false;
        }


        return ($userrole_id >= $article->userole_id) &&  $status;
    }
    // 歌曲下载页面
    public function download($id){
        $article=Article::findorFail($id);
        if(Auth::guard('web')->check() && $this->kanwenzhang(Auth::guard('web')->user(),$article) ){
            return view('qiantai/download',['article'=>$article]);
        }
        abort(404);
    }

    // 真正的下载页面
    public function downok($id){
        $article = Article::findorFail($id);
        if(Auth::guard('web')->check() && $this->kanwenzhang(Auth::guard('web')->user(),$article)){
            $article->increment('downtimes');
            return redirect($article->downlink);
        }
        abort(404);
    }
    // 根据歌手获取10首歌曲
    public function getTenMusics($author){
        return Article::where("author",'like',$author)->orderBy('hits','desc')->limit(10)->get();
    }
}
