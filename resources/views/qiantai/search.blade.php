@extends('qiantai/layout')
@section('content')
<div class="main zh">
<div class="left fl mb15">
<div class="list bgb ">
<h2 class="place ybbt1"><i class="fa fa-home"></i> <a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<b><font color="red">
@if(!empty($keyword))
{{$keyword}}
@endif
</font></b>搜索结果如下： </h2>
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
<ul>
@if(!empty($articles) and count($articles)>0)
@foreach($articles as $v)
<li>  
    <h2><a href="{{url('article_'.$v->id.'.html')}}" title="{{$v->title}}">{{$v->title}}-{{$v->author}}</a></h2>
    
    <small><span><i class="fa fa-clock-o"></i>{{$v->created_at}} </span><!--<span><i class="fa fa-user"></i>sven</span>--><span><i class="fa fa-folder"> <a href="{{url('list_'.$v->category_id.'.html')}}" title="{{getCategoryTitle($v->category_id)}}" target="_blank">{{getCategoryTitle($v->category_id)}}</a></i></span><span><i class="fa fa-cloud-download">下载热度</i> {{$v->hits+=125}}<!--209 -->℃</span></small>
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
@if(!empty($articles))
  	{{$articles->appends(['keyword'=>$keyword])->links()}}
@endif
</div>

</div>
</div>


@include("qiantai/right")

@endsection