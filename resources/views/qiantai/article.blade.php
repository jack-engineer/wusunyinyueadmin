@extends('qiantai.layout')

@section('content')

<div class="main zh">
<div class="left fl mb15">
<div class="info bgb mb15">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div class="flash-message message">
      <p class="alert alert-{{ $msg }}">
        {{ session()->get($msg) }}
      </p>
    </div>
  @endif
@endforeach
<h2 class="place ybbt1"><i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('list_'.$menu->type_id.'.html')}}">{{$menu->title}}</a>  <i class="fa fa-angle-right"></i> 正文</h2>
<div class="info-bt"> 
<h1 class="title">{{$article->title}}-{{$article->author}}</h1>
<small><!--<span><i class="fa fa-user"></i> sven</span>--><span><i class="fa fa-clock-o"></i> {{$article->created_at}}</span><span><i class="fa fa-folder"></i> <a href="{{url('list_'.$menu->type_id.'.html')}}" title="{{$menu->title}}" target="_blank">{{$menu->title}}</a></span><span><i class="fa fa-cloud-download"></i>{{$article->hits+=99856}}</span></small>
</div>

<div class="info-zi mb15" id="myarticle">
<!-- 如果没有登录，或者已经会员级别不够，或者已经过期，不允许下载 -->
@if($flag)
{{$article->title}}-{{$article->author}}
@endif
</div>
<!-- <button id="btn" style="display: block;">展开全部<img src="{{url('index_files/images/article-all.png')}}"></button> -->
<br>
@if($flag && Auth::guard('web')->check())
<div style="text-align:center;"><a href="#" onclick="window.open('{{url('member/download/').'/'.$article->id}}');"><img title="点击下载"  alt="点击下载" src="{{asset('images/xiazai.png')}}"></a> <br></div>
@else
<div style="text-align:center;font-size:20px">
  @if(Auth::guard('web')->check())
    该内容需要<a target="_blank" style="color:red" href="{{url('vip')}}">{{getTitleFromId($article->userrole_id,'userroles','title')}}</a> 等级会员才能下载 <br>
    您是<font color="red">{{getTitleFromId(Auth::guard('web')->user()->userrole_id,'userroles','title')}}(<span style="font-size:16px;font-weight:bold">
    @if(empty(Auth::guard('web')->user()->expiration_date))
    长期有效
    @else
    截至到{{Auth::guard('web')->user()->expiration_date}}
    @endif
  </span>)</font>,如您需要升级，请点击<a target="_blank" class="btn btn-success" href="{{url('vip')}}">升级</a> <br>

    您有任何问题，请联系本站管理员<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin={{configs('客服QQ')}}&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:372009617:51" alt="点击这里给我发消息" title="点击这里给我发消息"></a>

    <div class="span" class="border border-success border-0 " style="padding:15px;font-size:14px">
      @if(Auth::guard('web')->user()->coin>=$article->needcoin)
    您还可以使用积分下载，该文章需要<span class="text-danger font-weight-bold">{{$article->needcoin}}</span>积分可以下载，您有<span class="text-danger font-weight-bold">{{Auth::guard('web')->user()->coin}}</span>积分<a href="{{url('/member/downloadusecoin'.'/'.$article->id)}}" class="btn btn-success">点击使用积分下载</a>
      @else
    该歌曲需要<span class="text-danger font-weight-bold">{{$article->needcoin}}</span>积分可以下载，您有<span class="text-danger font-weight-bold">{{Auth::guard('web')->user()->coin}}</span>积分，积分不足，请 <a class="btn btn-success" target="_blank" href="{{url('vip')}}">充值</a>
      @endif
    </div>
  @else
    您还没有登录，查看下载链接，请点击<a style="color:red" href="{{url('login'.'/'.base64_encode(url()->current()))}}">登录</a>
  @endif
</div>
@endif
<br>
{{-- <div style="text-align:center;">
  提取码:<font color="red" size="4px" id="target">{{$article->downpassword}}</font>
  <button class="btn btn-primary" data-clipboard-action="copy" data-clipboard-target="#target" id="copy_btn">    
      点击复制提取码
  </button> 
</div> --}}
 
<div class="ad mb15 sjwu">
    <table width="100%" height="90" bgcolor="">
      <tbody><tr align="center">
        
      </tr>
    </tbody></table>
</div>
<p class="tags" style="diplay:block">
    <strong>
    tag标签：
    @if(count($article->tags)>0)
    @foreach ($article->tags as $item)
        <a href="{{url('/tags/'.getTitleFromTagid($item))}}">{{getTitleFromTagid($item)}}</a> &nbsp;&nbsp;&nbsp;&nbsp;
    @endforeach
    @endif
    </strong>   
</p>

<div class="sx mb15">
<ul>
@if($up)
<li class="fl">上一篇：<a href="{{url('article_'.$up->id.'.html')}}" target="_self" title="{{$up->title}}">{{$up->title}}</a></li>
@else
<li class="fl">上一篇：没有了</li>
@endif
@if($down)
<li class="fr ziyou">下一篇：<a href="{{url('article_'.$down->id.'.html')}}" target="_self" title="{{$down->title}}">{{$down->title}}</a></li>
@else
<li class="fl">下一篇：没有了</li>
@endif
<div class="clear"></div>
</ul></div>



<div class="xg"><h2 class="ybbt">猜你还喜欢</h2>

<ul>
@foreach($cainixihuan as $xihuan)
<li><span> </span><i class="fa fa-caret-right"></i> <a href="{{url('article_'.$xihuan->id.'.html')}}" title="{{$xihuan->title}}">{{$xihuan->author}}-{{$xihuan->title}}</a></li>
@endforeach
</ul></div>
<hr>
<form action="{{ url('member/comments/store') }}"  method="post" role="form">
            {!! csrf_field() !!}
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="box-body">
                @if ($errors->any())
                <div class="flash-message callout callout-danger message" style="border:2px solid red">
                    <h4>发生错误！</h4>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    <span>      3</span>秒后自动关闭<a href="javaScript:void(0)">点击关闭</a>
                </div>
                @endif
                <div class="form-group">
                  <div  style="border-bottom: 2px solid #c20c0c;width:100%;margin-bottom:15px">
                      <label for="content" style="font-size:20px;line-height:28px">评论</label>
                      @if(Auth::guard('web')->check())

                      @else
                      <a href="{{url('login'.'/'.base64_encode(url()->current()))}}" style="color:red"> 登录后评论 </a>
                      @endif
                  </div>

                    <textarea class="form-control" rows="3" name="content" id="content"
                    
                    @if(Auth::guard('web')->check())
                      placeholder="请输入留言内容"
                    @else
                      disabled="disabled" placeholder="请登录后发表留言"
                    @endif

                     placeholder="请输入评论内容">{{ old('content') }}</textarea>
                     @if(Auth::guard('web')->check())
                    <input type="text" class="form-control" name="key" value="验证码" onblur="if(this.value==&#39;&#39;) this.value=&#39;验证码&#39;;" onfocus="if(this.value==&#39;验证码&#39;) this.value=&#39;&#39;;" style="width:80px; height:40px; padding:5px 15px; float:left; margin-right:5px;"> <img src="{{captcha_src('math')}}" onclick="this.src='{{captcha_src('math')}}'+Math.random()" alt="点击刷新验证码">
                    @else
                    @endif
                    
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="pull-right">
                @if(Auth::guard('web')->check())

                    <button type="submit" class="btn btn-primary">提交</button>
                @else
                    <a href="{{url('login'.'/'.base64_encode(url()->current()))}}" style="color:red"> 登录后评论 </a>
                @endif
                </div>
            </div>
            <!-- /.box-footer-->
        </form>
  <hr>
  <script>
    function reply(a) {
      var nickname = a.getAttribute('data');
      var textArea = document.getElementById('content');
      textArea.innerHTML = '@'+nickname+' ';
    }
    </script>
  <div class="xg">
    <h2 class="ybbt">精彩评论</h2>
    <table class="table table-condensed ">
      @if(!empty($jingcaipinglun))
      @foreach($jingcaipinglun as $p)
      <tr>
        <td>用户：{{subtext(getUserNameById($p->user_id,'username'),5,'***')}}</td>
        <td>{{$p->content}}</td>
        <td>{{subtext($p->created_at,16,'')}}</td>
      <td><button data="{{getUserNameById($p->user_id,'username')}}" onclick="reply(this);" id="{{$p->id}}">回复</button></td>
      </tr>
      
      @endforeach
      @endif
    </table>
  </div>
</div>
</div>
<script>    
    $(document).ready(function(){      
        var clipboard = new Clipboard('#copy_btn');    
        clipboard.on('success', function(e) {    
            alert("提取码复制成功",1500);
            e.clearSelection();    
            // console.log(e.clearSelection);    
        });    
    });    
</script> 
@include('qiantai/right')
@endsection