
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>信息提示</title>
<style>
body{ margin:0; padding:0; background:#F0F0F0;font-size:12px; background:url(./public/images/bg.jpg) repeat;}
a { background: transparent; transition: all 0.2s linear; -webkit-transition: all 0.2s linear; -moz-transition: all 0.2s linear; -o-transition: all 0.2s linear; }
a:link, a:visited { color: #4D4B4B;; text-decoration: none; outline: none; }
a:hover { color: red; _color:;}
.tip{ width:532px; height:257px;background:url(./public/images/box.png) no-repeat; position:absolute; left:50%; top:50%; margin-left:-266px; margin-top:-128px;}
.closebox{ height:48px; overflow:hidden; width:100%;}
.closebox a{ display:inline-block; width:20px; height:20px; float:right; margin:15px;}
.message { width:390px; height:95px; overflow:hidden; background:#ccc; margin:50px 0 0 85px; background:url(./public/images/load.gif) left top no-repeat; text-indent:40px; line-height:35px; font-family:microsoft yahei; font-size:19px;}
.message a{ display:block; font-size:12px;text-indent:10px;}
.message a:hover{ text-decoration:underline}
.otherlink{ height:30px; line-height:30px;margin-top: 32px; font-size:12px; padding:0 20px; width:492px; color:#b7b7b8;}
.otherlink .fr{ float:right;}
.otherlink a{color:#b7b7b8;background:url(./public/images/ico.gif) no-repeat;padding-left:18px; margin-left:5px;}
.otherlink a:hover{ color:#4D4B4B;}
a.return{  background-position:0 0;}
a.next{  background-position:48px -16px; padding:0; padding-right:18px;}
a.index{  background-position:0 -32px;}
a.error{  background-position:0 -48px;}
</style>
<SCRIPT language=javascript>
var secs=3;//3秒
for(i=1;i<=secs;i++) 
{ window.setTimeout("update(" + i + ")", i * 1000);}
function update(num){ 
    if(num == secs){ history.go(-1); } 
    else 
    { } 
}
</SCRIPT>
</head>

<body>
	<div class="tip">
    	<div class="closebox"><a href="javascript:history.go(-1)" title="点击关闭并跳转"></a></div>
    	<div class="message">
        @if(session()->has('message'))
        {{$message}}
        @else
        发生错误
        @endif
        <a href="javascript:history.go(-1)">如果您的浏览器没有自动跳转,请点击跳转......</a></div>
        <div class="otherlink"><div class="fr"><a href="javascript:history.go(-1);" class="return">返回上页</a> <a href="javascript:history.go(-1)" class="next">快速跳转</a></div>快捷操作: <a href="{{url('/')}}" class="index">返回首页</a> </div>
    </div>
</body>
</html>