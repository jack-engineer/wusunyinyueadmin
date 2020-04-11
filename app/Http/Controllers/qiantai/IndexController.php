<?php

namespace App\Http\Controllers\qiantai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use App\Models\Guestbook;
use App\Models\UserInfo;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

use App\Models\Message;
class IndexController extends Controller
{
    public $menus;
    public $xiaoxi = false;

    //定义字段验证规则
    public $rules=[
        'username'      =>'required|unique:users',
        'password'      =>'required|confirmed|min:3',
        'email'        =>'email',
        'password_confirmation'    =>'required',
    ];


    public function __construct(){
        // 只能游客访问的页面，也就是登录之后不能访问的方法
        $this->middleware('guest')->only(['register','login']);
        $this->menus = Menu::get();
        view()->share('menus',$this->menus);
    }

    public function login(Request $request,$url = ''){
        if (request()->isMethod('get')) {
            return view('qiantai.login', ['url' => $url]);
        }
        
        if(!captcha_check($request->post('key'))){
            $errors[] = "验证码不正确，请重新输入验证码";
        }
        $this->validate($request,['username'=>'required','password'=>'required']);
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }
        $status = Auth::guard('web')->attempt([
            'username'=>request()->input('username'),
            'password'=>request()->input('password')
        ]);

        $user = Auth('web')->user();

        if ($status) {
            $ip = request()->getClientIp();
            // dd($ip);
            if($ip != '::1'){
                $userinfo = new UserInfo();
                $userinfo->user_id = $user->id;
                $userinfo->user_name = $user->username;
                $userinfo->loginip = $ip;
                $userinfo->save();
            }
            // 只判断是否有专门针对该用户的消息
            $getMessage = Message::where("to_uid",Auth()->user()->id)->where('status','!=',1)->whereNull("deleted_at")->orderBy('id', 'desc')->paginate(30);
            // 判断是否有未读消息
            if(count($getMessage)>0){
                $this->xiaoxi = true;
            }
            if($this->xiaoxi){
                return redirect(base64_decode($url))->withCookie('xiaoxi',$this->xiaoxi);
            }else{
                $cookie = Cookie::forget('xiaoxi');
                return redirect(base64_decode($url))->cookie($cookie);  
            }
        }else {
            $errors[]='抱歉，您输入的账户或密码有误！';
            return view('qiantai.login', ['url' => $url])->withInput(request()->input())->withErrors($errors);
        }
    }

    
    public function register(Request $request,$url = ''){
        if (request()->isMethod('get')) {
            return view('qiantai.register', ['url' => $url]);
        }
        //执行验证规则,直接验证，无需进行其他操作
        $this->validate($request,$this->rules);
        
        $username = request()->username;

        $password = request()->password;
        $repassword = request()->repassword;
        $email = request()->email;
        $key = strval(request()->key);

        if(!captcha_check($key)){
            $errors[] = "验证码不正确，请重新输入验证码";
        }
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }

        $user = new User;
        $user->username = $username;
        $user->userrole_id=1;
        $user->password = Hash::make($password);
        $user->email = $email;
        $user->parent_id=0;
        $user->coin=0;
        $user->created_at = $user->updated_at = Carbon::now();
        $user->expiration_date = null;
       
        if ($user->save()) {
            $id = $user->id;
            // $this->sendMessage($id);
            session()->flash('success','创建成功');
            return redirect()->route('userlogin');
        }else {
            return back()->with("message","创建失败");
        }       
    }

    // 系统自动给用户发消息 $id,用户id
    public function sendMessage($id){
        $message = new Message();
        $message->title = configs('注册后站内信标题')?:'欢迎加入无损音乐网站';
        $message->content = configs('注册后站内信内容')?:'欢迎加入无损音乐网站';
        $message->from_uid = 'sys_manager'; //系统发的信息，sys_manager_id
        $message->to_uid = array($id);
        $message->type = 'sys'; //用户发的，类型是user,系统发的是sys
        $message->status = 0;
        return $message->save();
    }

    public function insertUserRole($userrole_id,$user_id){
        $users_roles = new Users_Roles();
        DB::table('users_roles')->where('user_id','=',$user_id)->delete();
        $users_roles->user_id = $user_id;
        $users_roles->userrole_id = $userrole_id;
        $bb = $users_roles->save();
        return $bb;
    }
    public function vip(){
        return view('qiantai.vip');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('userlogin');
    }

    public function search(Request $request,$url = ''){
        $keyword = $request->keyword;
        $article = new Article();
        // dd($keyword);
        if (request()->isMethod('get')) {
            if(!empty($keyword)){
                $articles = $article->where(function ($query) use ($keyword) {
                    $query->where('title', 'like', "%{$keyword}%")->orWhere('author', 'like', "%{$keyword}%");
                })->orderBy('hits','desc')->paginate(10);
                return view('qiantai.search', ['articles'=>$articles,'keyword'=>$keyword,]);
            }else{
                return view('qiantai.search', ['articles'=>'']);
            }
        }
        // 检测关键字不能为空
        $this->validate($request,['keyboard'=>'required']);
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }

        $token = request()->cookie('User');
        if(!empty($token)){
            $t = unserialize($token);
            $this->user = User::find($t['id'])?:null;
        }  
        $keyword = $request->post('keyboard');
        
        $articles = $article->where(function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")->orWhere('author', 'like', "%{$keyword}%");
        })->orderBy('hits','desc')->paginate(10);
        return view('qiantai/search',['articles'=>$articles,'keyword'=>$keyword]);
           
    }

    public function index(){
        // 推荐
        $tuijian = Article::orderBy('hits','desc')->limit(9)->get();
        // 本周排行
        $benzhoupaihang = Article::orderBy('hits','desc')->orderBy('downtimes','desc')->limit(8)->get();
        $categorys = Category::whereNull('deleted_at')->limit(9)->get();
        $time = Carbon::now()->format('m-d'); 
        
        return view('qiantai/index',['menu'=>null,'tuijian'=>$tuijian,'benzhoupaihang'=>$benzhoupaihang,'categorys'=>$categorys,'time'=>$time]);
    }

    public function list($id){
        $menu = Menu::where("type_id",'=',$id)->first();
        if(empty($menu)){
            abort(404);
        }
        $articles = Article::whereNull('deleted_at')->orderBy('id','desc')->where('category_id',$id)->paginate(15);
        return view('qiantai/list',['menu'=>$menu,'articles'=>$articles]);
    }

    
    // 单页
    public function page($id)
    { 
        $content = Page::findorFail($id);
        // dd($content);

        // 上一篇，下一篇
        $up = Page::where("id",'<',$id)->orderBy('id','desc')->first();
        $down = Page::where("id",">",$id)->first();

        return view("qiantai.page",['content'=>$content,'menu'=>'','up'=>$up,'down'=>$down,]);
    }

    
    // 跳转页面
    public function jump($message=''){
        if(session()->has('message')){
            $message = session('message');
        }
        return view('qiantai/jump',['message'=>$message]);
    }

    // 
    // public function tags($tag){
    //     $articles = Article::where(function ($query) use ($tag) {
    //         $query->where('title', 'like', "%{$tag}%")->orWhere('author', 'like', "%{$tag}%");
    //     })->orderBy('hits','desc')->paginate(10);
    //     // $articles = Article::where('title', 'like', '%' . $tag . '%')->orWhere('content', 'like', '%' . $tag . '%')->orderBy('hits', 'desc')->paginate(15);
    //     return view('qiantai/tags',['articles'=>$articles,'tag'=>$tag]);
    // }

    public function guestbook(){
        // 精彩留言
        $jingcailiuyan = Guestbook::where('status',1)->orderBy('id','desc')->get();
        return view('qiantai/guestbook',['jingcailiuyan'=>$jingcailiuyan]);
    }
}
