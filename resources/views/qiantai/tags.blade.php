@extends('qiantai/layout')
@section('content')
<div class="main zh">
<div class="left fl mb15">
<div class="list bgb ">
<h2 class="place ybbt1"><i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a  title="TAG信息列表 ">TAG信息列表 </a>&nbsp;&gt;&nbsp;<a  title="{{$tag}} ">{{$tag}} </a>  </h2>
<ul>
@if(count($articles)>0)
@foreach($articles as $v)
<li>  
    <h2><a href="{{url('article_'.$v->id.'.html')}}" title="{{$v->title}}">{{$v->title}}-{{$v->author}}</a></h2>
    
    <small><span><i class="fa fa-clock-o"></i>{{$v->created_at}} </span><!--<span><i class="fa fa-user"></i>sven</span>--><span><i class="fa fa-folder"></i> <a href="" title="" target="_blank"></a></span><span><i class="fa fa-cloud-download">下载热度</i> {{$v->hits}}<!--209 -->℃</span></small>
<div class="clear"></div>
</li>
@endforeach
@else
<li>  
    <h2><a href="#" title="" target="_self">暂无列表</a></h2>
<div class="clear"></div>
</li>
</ul>
@endif
<style>
.pagination li{
    padding:0;
    border:none;
}
</style>
<div class="pagebar">
  	{{$articles->links()}}
</div>

</div>
</div>


@include("qiantai/right")

@endsection