<?php

namespace App\Http\Controllers\qiantai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Article;
use App\Models\User;
use App\Models\Comment;
use App\Models\UserInfo;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\SensitiveWords;
use Auth;
class CommentsController extends Controller
{
    public $user = null;

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
        $this->validate($request,$this->rules);

        if(!captcha_check($request->post('key'))){
            $errors[] = "验证码不正确，请重新输入验证码";
        }
        if (!empty($errors)) {
            return redirect()->back()->withInput(request()->input())->withErrors($errors);
        }


        $comment = new Comment();
        // 过滤内容
        $content = SensitiveWords::replace($request->content,'***');
        
        
        $comment->content =  $content;
        $comment->user_id=Auth::guard('web')->id();
        $comment->status=1;
        $comment->article_id = $request->article_id;

        if ($comment->save()) {
            return back()->with('success','发表成功');
        }else {
            return back();
        }
    }

    
}
