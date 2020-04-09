@extends('qiantai.layout')

@section('content')

<div class="main zh">
<div class="left fl mb15">
<div class="info bgb mb15">
<h2 class="place ybbt1"><i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp; 正文</h2>
<div class="info-bt"> 
<h1 class="title">{{$content->title}}</h1>
<small><!--<span><i class="fa fa-user"></i> juzi</span>--><span><i class="fa fa-clock-o"></i> {{$content->created_at}} </span><span><i class="fa fa-folder"></i></span></small>
</div>

<link rel="stylesheet" rev="stylesheet" href="{{asset('public/css/vipcss.css')}}" type="text/css">
<div class="info-zi mb15" id="myarticle" style="height:auto;"><style type="text/css">
.left{
    width: 100%;
}
</style>
{!!$content->content!!}
<div class="ad mb15 sjwu">
    <table width="100%" height="90" bgcolor="">
      <tbody><tr align="center">
      </tr>
    </tbody></table>
</div>

<div class="sx mb15">
<ul>

@if($up)
<li class="fl">上一篇：<a href="{{url('page_'.$up->id.'.html')}}" target="_self" title="{{$up->title}}">{{$up->title}}</a></li>
@else
<li class="fl">上一篇：没有了</li>
@endif
@if($down)
<li class="fr ziyou">下一篇：<a href="{{url('page_'.$down->id.'.html')}}" target="_self" title="{{$down->title}}">{{$down->title}}</a></li>
@else
<li class="fl">下一篇：没有了</li>
@endif
<div class="clear"></div>
</ul></div>

 
<div class="xg"><h2 class="ybbt">猜你还喜欢</h2>
<ul>

</ul></div>
</div>
</div>


<div id="box">   
<div id="float" class="div1">     
 
</div>   
</div>

</div>

<div class="clear"></div>

</div>
@endsection