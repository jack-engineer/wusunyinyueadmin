<?php

namespace App\Http\Controllers\qiantai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Usercoinlog;

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
        // 获取用户的角色 用户的角色如果为空，则默认是1，普通会员
        $userrole_id = $user->userrole_id??'1';

        if( empty($user->expiration_date)){//如果过期时间是空，也就是长期有效
            // 如果用户的角色>文章的角色，则可以下载
            return $userrole_id >= $article->userrole_id ? true : false;
        }

        // 如果没有过期
        if($user->expiration_date > date('Y-m-d H:i:s',strtotime('-1 day'))){
            return $userrole_id >= $article->userrole_id ? true : false;
        }else{
            // 如果过期了，只能下载青铜会员的文章
            return $article->userrole_id == '1'? true : false;
        }

    }
    // 歌曲下载页面
    public function download($id){
        $article=Article::findorFail($id);
        if(Auth::guard('web')->check() && $this->kanwenzhang(Auth::guard('web')->user(),$article) ){
            return view('qiantai/download',['article'=>$article,'usecoin'=>false]);
        }
        abort(404);
    }
    // 用积分下载页面
    public function downloadusecoin($id){
        // dd($id);
        $article=Article::findorFail($id);
        if(Auth::guard('web')->check() && Auth::guard('web')->user()->coin>=$article->needcoin ){
            return view('qiantai/download',['article'=>$article,'usecoin'=>true]);
        }
        abort(404);
    }

    // 真正的下载页面
    // 增加了下载记录
    public function downok($id){
        $article = Article::findorFail($id);
        if(Auth::guard('web')->check() && $this->kanwenzhang(Auth::guard('web')->user(),$article)){
            // 添加下载记录
            $usercoinlog = new Usercoinlog();
            $usercoinlog->user_id=Auth::guard('web')->id();
            $usercoinlog->content = "歌曲ID:".$article->id."<br>歌曲名称:".$article->title."<br>".'链接：'.$article->downlink."<br>密码：".$article->downpassword."<br>";
            $usercoinlog->coinlog = 0;
            $usercoinlog->coinlogafter = Auth::guard('web')->user()->coin ;
            $usercoinlog->save();

            $article->increment('downtimes');
            return redirect($article->downlink);
        }
        abort(404);
    }

    // 用积分下载的页面downokusecoin
    public function downokusecoin($id){
        $article = Article::findorFail($id);
        if(Auth::guard('web')->check() && Auth::guard('web')->user()->coin>=$article->needcoin ){

            // 记录积分
            $usercoinlog = new Usercoinlog();
            $usercoinlog->user_id=Auth::guard('web')->id();
            $usercoinlog->content = "歌曲ID:".$article->id."<br>歌曲名称:".$article->title."<br>".'链接：'.$article->downlink."<br>密码：".$article->downpassword."<br>";
            $usercoinlog->coinlog -= $article->needcoin;
            $usercoinlog->coinlogafter = Auth::guard('web')->user()->coin - $article->needcoin;
            $usercoinlog->save();

            // 修改用户积分
            $user = Auth::guard('web')->user();
            $user->coin -= $article->needcoin;
            $user->save();

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
