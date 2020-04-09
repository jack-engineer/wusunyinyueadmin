<?php

namespace App\Http\Controllers\qiantai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guestbook;
use App\Services\SensitiveWords;
use Auth;

class GuestbookController extends Controller{
    //定义字段验证规则
    public $rules=[
        // 'user_id'=>'required',
        'content' => 'required',
        // 'status'=>'required',
        'key'=>'required',
        'article_id'=>'required',
    ];
    public function store(Request $request){
        //执行验证规则,直接验证，无需进行其他操作
        $this->validate($request,[
            'content' => 'required',
            'key'=>'required',
        ]);

        if(!captcha_check($request->post('key'))){
            $errors[] = "验证码不正确，请重新输入验证码";
        }
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }
        $guestbook = new Guestbook();

        // 过滤内容
        $content = SensitiveWords::replace($request->content,'***');
        
        $guestbook->content =  $content;
        $guestbook->user_id=Auth::guard('web')->id();
        $guestbook->status='Y';

        if ($guestbook->save()) {
            return back()->with('success','发表成功');
        }else {
            return back();
        }
    }
}
