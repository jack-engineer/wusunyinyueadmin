<!DOCTYPE html>
<html class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<meta name="renderer" content="webkit"> 
<meta http-equiv="X-UA-Compatible" content="edge">
<title>无损音乐下载-FLAC、APE、WAV、DSD、DTS免费的无损音乐下载网站</title> 
<!-- <base target="blank"><base href="." target="blank"> -->
<!-- Nobird_Seo_Tools Start -->
<meta name="author" content="">
<meta name="keywords" content="无损音乐下载,无损音乐,无损音乐下载网站,无损音乐免费下载,无损音乐网,无损音乐网站,音乐下载,歌曲下载">
<meta name="description" content="无损音乐下载「51flacmusic.com」是最大的无损音乐下载网站。收录的无损音乐格式有flac、ape、wav、dsd、dts等，每首无损音乐都是精心挑选，真正免费的无损音乐下载网站。">

<link rel="shortcut icon" href="{{url('/')}}/favicon.ico" type="image/x-icon" />
<!-- Nobird_Seo_Tools End -->
    <meta name="generator" content="Z-BlogPHP 1.5.1 Zero">
    <link rel="stylesheet" rev="stylesheet" href="{{asset('index_files/txcstx.css')}}" type="text/css" media="all">
    <link rel="stylesheet" rev="stylesheet" href="{{asset('index_files/font-awesome.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" rev="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
	
	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/clipboard.min.js')}}"></script>
    <script src="{{asset('index_files/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('index_files/jquery.bxslider.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('index_files/jquery.superslide.2.1.1.js')}}" type="text/javascript"></script>
<style type="text/css">
body{background:url("{{asset('index_files/images/bg_tx.jpg')}}") 0 0 repeat;}#nav,.ss #btnPost,.sous #btnPost,.right #divSearchPanel input[type="submit"],#divTags dd ul li a,#divhottag dd ul li a,.pagebar a:hover,.pagebar .now-page,#frmSumbit .button,.banner .hd ul .on,#nav li a,#nav li,.bx-wrapper .bx-pager.bx-default-pager a,.list-tu1 li a:hover p,.index-list-tu li a:hover p,#nav li ul li a:hover,.sj-ss #btnPost{background-color:#000000;}#nav>ul>li.hover>a,#nav li.on a,#nav li ul li a{background-color:#564e4e;}.right #divSearchPanel dd form,.pagebar a:hover,.pagebar .now-page{border:1px solid #000000;}#divCalendar td a,.notice .tab-hd li.on a,a:hover,.yanse,.tags a{color:#000000;}.info-zi h2,.info-zi h3{border-left:3px solid #000000;}@media screen and (max-width: 1100px){#nav{background:url({{asset('./index_files/images/logo.jpg')}}) no-repeat center center #000000;background-size:133px 40px;background-color:#ccc}}
ul{margin-bottom:0}a{color:#000;}.hot h2{font-weight:bold}.zh p{margin-bottom:0;}
.fancybox-margin{margin-right:17px !important;}
</style>
<link href="{{asset('index_files/fancybox.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('index_files/gourl.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" media="all" ><link href="{{asset('index_files/font-awesome.min(1).css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- 页头 -->
<div class="top sjwu"><div class="zh"><strong><a class="displaynone" href="{{url('/')}}">无损音乐下载</a></strong>专注WAV、FLAC、DSD、Hi-Res、DTS格式的高品质无损音乐下载！

<span class="fr" id="frwenzi" ><strong>
<a target="_blank" href="http://searchmusic.51flacmusic.com"><font color="#f50"><i class="fa fa-music" aria-hidden="true"></i>  在线音乐</font></a>　|　<!-- <a href="https://www.51flacmusic.com/mall/"><font color="#8d29cd"><i class="fa fa-car" aria-hidden="true"></i>  车载U盘</font></a>　|　<a href="https://www.hifige.com/"><font color="#06a"><i class="fa fa-play-circle" aria-hidden="true"></i>  HIFI专辑</font></a>　|　 -->
<a href="{{url('vip')}}"><font color="#ff0000"><i class="fa fa-heart" aria-hidden="true"></i>  赞助VIP</font></a></strong>　| 
@if(Auth::guard('web')->check())
<i class="fa fa-user" aria-hidden="true"></i><font color="red"><b>{{Auth::user()->username}}</b>

@if(Cookie::has('xiaoxi'))
&nbsp;&nbsp;<a href="{{url('member/msg')}}" target="_blank" id="word"><img src="{{asset('images/nohaveread.gif')}}" alt="您有新的消息，请注意查收">您有新的消息，请注意查收</a>&nbsp;&nbsp;
@endif

</font>      <a href="{{url('member')}}" target="_blank">会员中心</a>      <a href="{{url('logout')}}" target="_parent">退出</a>　
@else
<i class="fa fa-user" aria-hidden="true"></i>  <a href="{{url('login')}}">登录</a> | <a href="{{url('register')}}">注册</a>
@endif
</span></div></div>
<div class="sjwu head"><div class="zh">
<h1 class="logo fl displaynone"><a href="{{url('/')}}" title="无损音乐下载"><img src="{{url('/index_files/images/logo.png')}}"/></a></h1>
<span class="ss fl">
  <form name="search" class="navbar-form navbar-left" role="search" method="post" action="{{url('search')}}">
      {{csrf_field()}}
      <input name="keyboard" class="form-control" placeholder="请直接搜索歌曲名 或 歌手名" size="11" id="edtSearch" type="text"> 
      <button class="search-submit btn btn-default" id="btnPost" type="submit"><i class="fa fa-search"></i></button>
    </form>
</span>
<span class="rss fr displaynone"><table width="460" height="60" bgcolor="">
  <tbody><tr align="center">
<td><a class="displaynone" href="{{url('/')}}" target="_blank"><img src="{{asset('index_files/Ahead454191010.jpg')}}"></a></td>
  </tr>
</tbody></table></span>
<div class="clear"></div></div>
</div>

<div class="clearfix mb15" id="nav">
<a href="javascript:;" id="pull"><i class="fa fa-bars"></i><i class="fa fa-bars"></i></a>
<ul class="clearfix zh nav displaynone" id="ulmenu">
<li id="nvabar-item-index" 
@if(empty($menu))
class="on"
@endif
><a href="{{url('/')}}">首页</a></li>
<!-- 菜单行 -->
@foreach($menus as $m)
<li id="tnavbar-category-{{$m->id}}" 
@if(!empty($menu) and $menu->id===$m->id)
class="on"
@endif
><a href="
@if($m->type=='link')
{{url('/'.$m->url)}}
@else
{{url('list_'.$m->type_id.'.html')}}
@endif
">{{$m->title}}</a></li>
@endforeach
</ul>

</div>
</div>
<div class="h60"></div>

@yield('content')

<!-- 页脚 -->
<div class="footer">
<div class="zh">
<p>Copyright © <a href="{{url('/')}}">无损音乐下载</a>   </p>
<a href="{{url('/')}}">歌手大全</a> | <a href="{{url('/')}}">sitemap</a> | <span id="cnzz_stat_icon_1278243445"><a href="#" target="_self" title="站长统计">站长统计</a> | <a href="{{url('member')}}">会员中心</a></span>
<p>本站音乐来源网络及收藏，服务器不存储任何音乐文件，无意侵犯您的版权，仅供会员交流学习！<br>版权归发行方所有，如若任何人声称是任何音乐的版权所有人,请联系1074210269@qq.com,本站会尽快删除！</p>
</div>
</div>
<!-- 回到顶部 -->
<div id="to_top001"><a href="#top" target="_self"><img src="{{asset('index_files/gotop01.png')}}" alt="" width="50" height="50" id="Image1"></a></div>
<!-- 回到底部 -->
<div id="to_end001"><a href="#end" target="_self"><img src="{{asset('index_files/goend01.png')}}" width="50" height="50"></a></div>
<script>
			function blink(){
				var color="#FF00FF,#FF00CC,#FF0099,#FF0066,#FF0033,#FFFF00,#00FF00,#000000";
				color=color.split(",");
				$("#word").css('color',color[parseInt(Math.random()*color.length)]);
			}
			setInterval("blink()",200);
		</script>
<script>

var speed = 400;
    $("#to_top001").on('click',function(){
      $( "html,body").animate({ scrollTop : 0 }, speed);
    });
    $("#to_end001").on('click',function(){
      $("html,body").animate({scrollTop:document.body.clientHeight + 'px'}, speed);
    });
    $(document).scroll(function(){
      gundong();
    });
var  gundong=function(){
  var scroll_top =  $(document).scrollTop();
  if(scroll_top > 500){
      $("#to_top001").show();
  }else{
      $("#to_top001").hide();
  }
  var  scroll_end = $(document).height()-$(document).scrollTop();
  if(scroll_end < 1200){
    $("#to_end001").hide();
  }else{
    $("#to_end001").show();
  }
}	
var num = 3;
	function changeNum(){
		num--;
		if(num<0){
			$(".message").slideUp(600);
		}else{
			$(".message span").text(num);
			setTimeout(changeNum, 1000);
		}
	}
	$(function(){
		setTimeout(changeNum, 1000);
		$(".message a").on('click',function(){
			$(".message").slideUp(600);
		});
	});

$(document).ready(function(){
$("#pull").click(function(){
    $(".nav").slideToggle("slow");
  });
});
</script>
<script id="ilt" src="http://player.51flacmusic.com/player/js/player.js" key="1ded621d345f4004aa232c33672b69e5"></script>
</body></html>