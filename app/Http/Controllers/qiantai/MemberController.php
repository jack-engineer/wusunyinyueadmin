<?php

namespace App\Http\Controllers\qiantai;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Messagetemplate;
use App\Models\Userorder;
use App\Models\Article;
use App\Models\Usercoinlog;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Auth;

class MemberController extends Controller
{
    //定义错误提示
    public $errors = [
        'username.required'         =>'用户名不能为空',
        'username.unique'           =>'用户名称已存在',
        'password.required'         =>'密码不能为空',
        'repassword.required'       =>'二次输入密码不能为空',
        'emaill.required'           =>'邮箱不能为空',
        'key.required'              =>'验证码不能为空',
        'keyboard.required'         =>"关键词不能为空",
        'nick.between'              =>"真实姓名不对",
        'qq.numeric'=>'qq必须是数字',
        'phone.numeric'=>'手机号必须是数字',
        'password,required'=>'原密码必须填写',
    ];
    //定义字段验证规则
    public $rules=[
        'nickname'      =>'between:2,6',
        'qq'      =>'numeric',
        'phone'    =>'numeric',
    ];
    public $user = null;
    public function index()
    {
        return view('member.index');
    }

    public function editinfo(Request $request)
    {
        
        $user = Auth::guard('web')->user();
        
        // 模型验证策略，验证是否是同一个人
        // $this->authorize('update',$user);

        if (request()->isMethod('get')) {
            return view('member.editinfo');
        }
        
        $this->validate($request,$this->rules,$this->errors);
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }
        
        // dd($request->post());
        

        $user->name = $request->name;
        $user->qq = $request->qq;
        $user->phone = $request->phone;
        if($user->save()){
            session()->flash('message', '修改成功');
            return view('member.editinfo');
        }
    }

    public function editsafeinfo(Request $request){
        $user = Auth::guard('web')->user();

        // 模型验证策略，验证是否是同一个人
        // $this->authorize('update',$user);

        if (request()->isMethod('get')) {
            return view('member.editsafeinfo');
        }

        $this->validate($request,['password'=>'required'],$this->errors);
        
        $password = $request->password;
        if(!Hash::check($password,$user->password)){
            $errors[]='抱歉，您输入的密码有误！';
        }

        if($request->newpassword !== $request->repassword){
            $errors[]='抱歉，您两次输入的密码不一致，请重新输入！';
        }

        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }
        if(!empty($request->newpassword && !empty($request->repassword))){
            $user->password = Hash::make($request->newpassword);
        }
        $user->email = $request->email;
        if($user->save()){
            session()->flash('message', '修改成功');
            return back();
        }

    }

    public function buygroup()
    {
        return view('member.buygroup');
    }

    public function buylist()
    {
        $user = Auth::guard('web')->user();
        $userorder = Userorder::where('user_id',"=",$user->id)->whereNull('deleted_at')->orderBy('id','desc')->paginate(10);
        // dd($userorder);
        return view('member.buylist',['user'=>$this->user,'userorder'=>$userorder ]);
    }
    // 用户的积分记录
    public function coinlog(){
        $user = Auth::guard('web')->user();
        $coinlog = Usercoinlog::where('user_id',"=",$user->id)->orderBy('id','desc')->paginate(6);
        // dd($userorder);
        return view('member.coinlog',['user'=>$this->user,'coinlog'=>$coinlog ]);
    }

    public function msg()
    {
        $message = new Message();
        if (request()->isMethod('get'))  {
            $userid = Auth::guard('web')->id();

            $msg = Message::all();
            // 查找需要显示的消息列表
            $needshowlist = [];
            foreach($msg as $m){
                if(!stripos($m->to_uid,',')){
                    if($m->to_uid == $userid){
                        $needshowlist[]=$m->id;
                        // 改变该消息的状态
                        DB::table('messages')->where('id',$m->id)->update(['status'=>1]);
                    }
                }else{
                    $arr = explode(',',$m->to_uid);
                    if(!empty(array_search($userid,$arr))){
                        $needshowlist[]=$m->id;
                    }
                }
            }
            // dd($needshowlist);
            // 查出需要显示的消息列表
            $cookie = Cookie::forget('xiaoxi');
            $getMessage = Message::whereIn("id",$needshowlist)->orderBy('id', 'desc')->paginate(30);
            // 消息模板
            $messagetemplate = Messagetemplate::find(5);
            // dd($messagetemplate);
            return response()->view('member.msg', ['getMessage' => $getMessage,  'messagetemplate'=>$messagetemplate])->cookie($cookie);
        }
        return view('member.msg');
    }

    // public function del($id){
    //     $b = Message::where("to_uid",Auth::guard('web')->id())->where('id',$id)->first();
        
    //     if(!empty($b) && $b->delete()){
    //         return back()->with('message','删除成功！');
    //     }else{
    //         abort(404);
    //     }
    // }

    // public function read($id)
    // {
    //     $b = Message::where("to_uid",Auth::guard('web')->id())->where('id',$id)->first();
    //     if(!empty($b) && $b->where('id',$id)->update(['status'=>1])){
    //         $cookie = Cookie::forget('xiaoxi');
    //         // dd($cookie);
    //         return back()->with('message','设置成功！')->cookie($cookie);
    //     }else{
    //         abort(404);
    //     }
    // }

    

}
