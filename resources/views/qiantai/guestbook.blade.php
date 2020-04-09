@extends('qiantai/layout')
@section('content')
<div class="main zh">
<div class="left fl mb15">
<div class="list bgb ">
<h2 class="place ybbt1"><i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp; 留言本</h2>

<ul>
<li>  
    <p>{!!configs('留言设置')!!}</p>
<br>
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div class="flash-message message">
      <p class="alert alert-{{ $msg }}">
        {{ session()->get($msg) }}
      </p>
    </div>
  @endif
@endforeach
<form action="{{ url('member/guestbook/store') }}"  method="post" role="form">
            {!! csrf_field() !!}
            <input type="hidden" name="article_id" value="">
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
                      <label for="content" style="font-size:20px;line-height:28px">留言</label>
                      @if(!Auth::guard('web')->check())
                      <a href="{{url('login'.'/'.base64_encode(url()->current()))}}" style="color:red"> 登录后留言 </a>
                      @endif
                  </div>

                    <textarea class="form-control" rows="6" name="content" id="content"
                    
                    @if(Auth::guard('web')->check())
                      placeholder="请输入留言内容"
                    @else
                      disabled="disabled" placeholder="请登录后发表留言"
                    @endif
                    >{{ old('content') }}</textarea>

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
                    <a href="{{url('login'.'/'.base64_encode(url()->current()))}}" style="color:red"> 登录后留言 </a>
                @endif
                </div>
            </div>
            <!-- /.box-footer-->
        </form>
  <hr>


  <script>
            function reply(a) {
              var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
              var textArea = document.getElementById('content');
              textArea.innerHTML = '@'+nickname+'~~~';
            }
            </script>
  
  <div class="xg">
    <h2 class="ybbt">精彩留言</h2>
    <table class="table table-condensed ">
      @if(!empty($jingcailiuyan))
      @foreach($jingcailiuyan as $p)
      <tr>
        <td data="{{getUserNameById($p->user_id,'name')}}">昵称：{{subtext(getUserNameById($p->user_id,'name'),5,'***')}}</td>
        <td>{{$p->content}}</td>
        <td><a href="#new" onclick="reply(this);">回复</a></td>
      </tr>
      <!-- <tr>
        <td cols='4'>

        </td>
      </tr> -->
      @endforeach
      @endif
    </table>
  </div>

<div class="clear"></div>
</li>
</ul>
<style>
.pagination li{
    padding:0;
    border:none;
}
</style>
<div class="pagebar">
</div>

</div>
</div>

@include("qiantai/right")

@endsection