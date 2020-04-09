@extends('qiantai.form')
@section('loginregisterform')
<form name="form1" method="post" action="{{url('login', $url)}}">
    {!!csrf_field()!!}
<div class="loginbox">
    	<div class="block">
        <section class="content">
            @include('layouts._message')
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
            	<h1>已有登陆帐号</h1>
                <ul>
                	<li class="inputfont"><input type="text" class="input" name="username" value="" placeholder="用户名"></li>
                    <li class="inputfont"><input type="password" class="input" name="password" value="" placeholder="密码"></li>
                    <li><input type="text" class="input" name="key" value="验证码" onblur="if(this.value==&#39;&#39;) this.value=&#39;验证码&#39;;" onfocus="if(this.value==&#39;验证码&#39;) this.value=&#39;&#39;;" style="width:80px; height:25px; padding:5px 15px; float:left; margin-right:5px;"> <img src="{{captcha_src('math')}}" onclick="this.src='{{captcha_src('math')}}'+Math.random()" alt="点击刷新验证码"></li>
                    <li><input type="checkbox" name="lifetime" value="315360000" class="fl" id="lifetime"><label for="lifetime"><a>保持登陆</a></label> | <a class="reg" href="{{url('register')}}">免费注册</a> | <a class="fp"  target="_blank">忘记密码?</a> </li>
                    <li><input type="submit" class="loginbtn" value="登 陆"></li>
                </ul>
                <h1>使用第三方帐号登陆</h1>
                <div class="third-login"> <a hidefocus="true" class="qq" target="_blank">QQ</a> <a hidefocus="true" class="sina" target="_blank">新浪微博</a></div>
            </div>
        </div>
</div>
</form>
<script>
//导航栏 填充 title的内容
var a = "会员登陆";
$("title").text(a);
</script>
@endsection