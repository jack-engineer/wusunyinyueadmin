@extends('qiantai.form')
@section('loginregisterform')
<form name="form1" method="post" action="{{url('register')}}">
    {!!csrf_field()!!}
<div class="loginbox">
    	<div class="block">
        <section class="content">
@if(session()->has('message'))
				<div class="message">
					<h3>{{session()->get('message')}} &nbsp;&nbsp;&nbsp;&nbsp;<span>3</span>秒后自动关闭<a href="javaScript:void(0)">点击关闭</a></h3>
				</div>
@endif
    @if ($errors->any())
    <div class="callout callout-danger message">
        <h4>发生错误！</h4>
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        <span>      3</span>秒后自动关闭<a href="javaScript:void(0)">点击关闭</a>
    </div>
    @endif
            <div class="loginform">
            	<h1>注册帐号 	<div class="third-login" style="display:inline-block; margin-left:10px;"> <a hidefocus="true"  class="qq" target="_blank">QQ</a> <a hidefocus="true"  class="sina" target="_blank">新浪微博</a></div></h1>
                <ul>
                	<li class="inputfont"><input type="text" class="input" name="username" value="{{old('username')}}" placeholder="用户名"></li>
                    <li class="inputfont"><input type="password" class="input" name="password" value="{{old('password')}}" placeholder="密码"></li>
                    <li class="inputfont"><input type="password" class="input" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="再次输入密码"></li>
                    <li class="inputfont"><input type="text" class="input" name="email" value="{{old('email')}}" placeholder="邮箱"></li>
                    <li style="height:30px; margin-bottom:0;" class="inputfont"><input type="text" class="input" name="key" value="" style="width:80px; height:28px; padding:5px 15px; float:left; margin-right:5px;" value="{{old('key')}}" placeholder="验证码"> <img src="{{captcha_src('math')}}" onclick="this.src='{{captcha_src('math')}}'+Math.random()" alt="点击刷新验证码"></li>
                    <li><input type="submit" class="loginbtn" value="立刻注册"></li>
                </ul>
            </div>
        </div>
</div>
</form>

<script>
//导航栏 填充 title的内容
var a = "会员注册";
$("title").text(a);
</script>
@endsection