@extends('qiantai/layout')
@section('content')

<div class="main zh">
<div class="left fl">
<div class="flash fl bgb mb15">
<div class="bx-wrapper" style="max-width: 100%;"><div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 320px;"><ul class="bxslider" style="width: 615%; position: relative; transition-duration: 0s; transform: translate3d(-1140px, 0px, 0px);"><li style="float: left; list-style: none; position: relative; width: 380px;" class="bx-clone"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/upan1.jpg" title="高品质车载U盘"></a></li>
<!--<li><a data-type="3" data-tmpl="350x270" data-tmplid="33" data-rd="2" data-style="2" data-border="1" href="#"></a></li>-->
<li style="float: left; list-style: none; position: relative; width: 380px;"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/vip3.jpg" title="高品质真音乐"></a></li>
<li style="float: left; list-style: none; position: relative; width: 380px;"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/upan.jpg" title="高品质车载U盘"></a></li>
<li style="float: left; list-style: none; position: relative; width: 380px;"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/VIP1.jpg" title="高品质真音乐"></a></li>
<li style="float: left; list-style: none; position: relative; width: 380px;"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/upan1.jpg" title="高品质车载U盘"></a></li>
<li style="float: left; list-style: none; position: relative; width: 380px;" class="bx-clone"><a href="{{url('vip')}}" rel="nofollow"><img src="./index_files/vip3.jpg" title="高品质真音乐"></a></li></ul></div><div class="bx-controls bx-has-pager bx-has-controls-direction"><div class="bx-pager bx-default-pager"><div class="bx-pager-item"><a href="{{url('/')}}" data-slide-index="0" class="bx-pager-link">1</a></div><div class="bx-pager-item"><a href="{{url('/')}}" data-slide-index="1" class="bx-pager-link">2</a></div><div class="bx-pager-item"><a href="{{url('/')}}" data-slide-index="2" class="bx-pager-link active">3</a></div><div class="bx-pager-item"><a href="{{url('/')}}" data-slide-index="3" class="bx-pager-link">4</a></div></div><div class="bx-controls-direction"><a class="bx-prev" href="{{url('/')}}">Prev</a><a class="bx-next" href="{{url('/')}}">Next</a></div></div></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('.bxslider').bxSlider({auto: true});
});
</script>

<div class="hot bgb fr mb15">
<!--推荐文章-->
 <h2><a href="{{url('article_'.$tuijian[0]->id.'.html')}}" title="{{$tuijian[0]->title}}"> {{$tuijian[0]->author}}-{{$tuijian[0]->title}} </a></h2>
<p> <a href="{{url('article_'.$tuijian[1]->id.'.html')}}" title="{{$tuijian[1]->title}}"> {{$tuijian[1]->author}}-{{$tuijian[1]->title}}</a><span><font color="red">{{$time}}</font></span></p>      

<ul>
@foreach($tuijian as $k=>$t)
@if($k>1)
<li>
<span><font color="red">{{$time}}</font></span>
<i class="fa fa-caret-right"></i> <a href="{{url('article_'.$t->id.'.html')}}" title="{{$t->title}}">{{$t->author}}-{{$t->title}}</a></li>
@endif
@endforeach
</ul>
</div>
</div>

<div class="right fr">
<dl class="wupd"> <div class="notice"> <div class="tab-hd"> <ul class="tab-nav"> 
<li class="on"><a href="javascript:void" class="wux">站长推荐</a></li><li class=""><a href="javascript:void">本周排行</a></li> <li><a href="javascript:void">下载总榜</a></li> 
</ul> </div> 
<div class="tab-bd"> 
            <div class="tab-pal">
                <ul><!--站长推荐-->
        <li><b>[顶]<span class="fr zuo10"></span><a href="{{url('vip')}}" title="[无损音乐下载]免费下载无损音乐的方法说明" class="yanse">本站免费下载无损音乐的方法</a></b></li>
        @if(count(getArticles('id','desc',7))>0)
                @foreach(getArticles('id','desc',7) as $x)
        <li><span class="fr zuo10"><span><font color="red">{{$time}}</font></span></span><a href="{{url('article_'.$x->id.'.html')}}" title="{{$x->title}}" class="yanse">{{$x->author}}-{{$x->title}}</a></li>  
         @endforeach
                @endif
 
                </ul>
            </div>
            <div class="tab-pal" style="display: none;">
                <ul><!--本周排行-->
                @foreach($benzhoupaihang as $x)
        <li><span class="fr zuo10"><span><font color="red">{{$time}}</font></span></span><a href="{{url('article_'.$x->id.'.html')}}" title="{{$x->title}}" class="yanse">{{$x->author}}-{{$x->title}}</a></li>
                @endforeach
                </ul>
</div>
            <div class="tab-pal" style="display: none;">
                <ul><!--下载总榜-->
                @if(count(getArticles('downtimes','desc',8))>0)
                @foreach(getArticles('downtimes','desc',8) as $x)
        <li><span class="fr zuo10"><span><font color="red">{{$time}}</font></span></span><a href="{{url('article_'.$x->id.'.html')}}" title="{{$x->title}}" class="yanse">{{$x->author}}-{{$x->title}}</a></li>
                @endforeach
                @endif
                </ul>
            </div>

</div> </div>
<script type="text/javascript">jQuery(".notice").slide({ titCell:".tab-hd li", mainCell:".tab-bd",delayTime:0});</script></dl>
</div>

<div class="clear"></div>

<div class="index-cms">

@foreach($categorys as $c)
<dl class="bgb">
<dt class="ybbt"><a class="more fr" href="{{url('/').'/'.'list_'.$c->id.'.html'}}" title="{{$c->title}}"><i class="fa fa-list-ul"></i></a> <a href="{{url('/').'/'.'list_'.$c->id.'.html'}}" class="yanse">{{$c->title}}</a></dt><dd>
<ul>
@foreach(getTenArticles($c->id,'id') as $a)
<li><span><font color="red">{{$time}}</font></span><i class="fa fa-caret-right"></i>  <a target="_blank" href="{{url('/').'/article_'.$a->id.'.html'}}" title="{{$a->author}}-{{$a->title}}">{{$a->author}}-{{$a->title}}</a></li>
@endforeach
</ul></dd>
</dl>
@endforeach

<div class="clear"></div>
</div>



<div class="links bgb pd mb15"><h2 class="ybbt">友情链接</h2>
<!--<ul>
<li><a href="{{url('/')}}" target="_blank">无损音乐</a></li><li><a href="{{url('/')}}" target="_blank">hires后花园</a></li><li><a href="{{url('/')}}" target="_blank">发烧音乐  </a></li><li><a href="{{url('/')}}" target="_blank">高品质音乐</a></li><li><a href="{{url('/')}}" target="_blank">50Yin免费音乐论坛</a></li><li><a href="{{url('/')}}" target="_blank">梦雪素材</a></li><li><a href="{{url('/')}}" target="_blank">无损音乐免费下载</a></li><li><a href="{{url('/')}}" target="_blank">DSD音乐</a></li><div class="clear"></div>
</ul>-->
</div>
</div>
@endsection