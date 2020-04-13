
<div class="right fr">
<dl class="wupd">
<div class="notice">
    <div class="tab-hd">
        <ul class="tab-nav"> 
        <li class="on"><a href="javascript:void">本周排行</a></li> <li class=""><a href="javascript:void">下载排行</a></li> <li><a href="javascript:void" class="wux">站内公告</a></li>
        </ul>
    </div> 
<div class="tab-bd"> 
        <div class="tab-pal" style="display: none;">
            <ul>
@if(count(getArticles('hits','desc',8))>0)
@foreach(getArticles('hits','desc',8) as $x)
                        <li><span class="fr zuo10"></span><a href="{{url('article_'.$x->id.'.html')}}" title="{{$x->title}}" class="yanse">{{$x->author}}-{{$x->title}}</a></li>
@endforeach
@endif                      
                        
                        </ul>
		</div>
		<div class="tab-pal" style="display: block;">
            <ul>
@if(count(getArticles('downtimes','desc',8))>0)
@foreach(getArticles('downtimes','desc',8) as $x)
                        <li><span class="fr zuo10"></span><a href="{{url('article_'.$x->id.'.html')}}" title="{{$x->title}}" class="yanse">{{$x->author}}-{{$x->title}}</a></li>
@endforeach
@endif
                        </ul>
        </div>
		<div class="tab-pal" style="display: none;">
            <ul>
            <li><span class="fr zuo10"></span><a href="{{url('vip')}}" title="高品质无损音乐下载会员自助开通" class="yanse"><font color="red">积分充值和本站会员介绍</font></a></li>
            @if(count(getPages('id','desc',7))>0)
            @foreach(getPages('id','desc',7) as $g)
                        <li><span class="fr zuo10"></span><a href="{{url('page_'.$g->id.'.html')}}" title="{{$g->title}}" class="yanse">{{$g->title}}</a></li>
            @endforeach
            @endif
                        
                        </ul>
		</div>
</div> </div>
 </dl> 
    <dl class="wupd"> 
<div class="notice"> 
        <a href="{{url('vip')}}"><img src="{{url('/index_files/vip3.jpg')}}" width="336" height="226"></a>
</div>
<script type="text/javascript">jQuery(".notice").slide({ titCell:".tab-hd li", mainCell:".tab-bd",delayTime:0});</script></dl>

<dl class="function" id="divhottag">
<dt class="function_t">热门歌手推荐</dt>
<dd class="function_c">


<ul>
        <li><a href="{{url('/tags'.'/谭咏麟')}}" title="查看更多有关于 谭咏麟 的文章" target="_blank" class="tags8">谭咏麟</a></li>
        <li><a href="{{url('/tags'.'/群星')}}" title="查看更多有关于 群星 的文章" target="_blank" class="tags8">群星</a></li>
        <li><a href="{{url('/tags'.'/陈奕迅')}}" title="查看更多有关于 陈奕迅 的文章" target="_blank" class="tags1">陈奕迅</a></li>
        <li><a href="{{url('/tags'.'/张学友')}}" title="查看更多有关于 张学友 的文章" target="_blank" class="tags9">张学友</a></li>
        <li><a href="{{url('/tags'.'/刘德华')}}" title="查看更多有关于 刘德华 的文章" target="_blank" class="tags7">刘德华</a></li>
        <li><a href="{{url('/tags'.'/周杰伦')}}" title="查看更多有关于 周杰伦 的文章" target="_blank" class="tags5">周杰伦</a></li>
        <li><a href="{{url('/tags'.'/王菲')}}" title="查看更多有关于 王菲 的文章" target="_blank" class="tags7">王菲</a></li>
        <li><a href="{{url('/tags'.'/孙露')}}" title="查看更多有关于 孙露 的文章" target="_blank" class="tags0">孙露</a></li>
        <li><a href="{{url('/tags'.'/蔡琴')}}" title="查看更多有关于 蔡琴 的文章" target="_blank" class="tags2">蔡琴</a></li>
        <li><a href="{{url('/tags'.'/莫文蔚')}}" title="查看更多有关于 莫文蔚 的文章" target="_blank" class="tags8">莫文蔚</a></li>
        <li><a href="{{url('/tags'.'/黎明')}}" title="查看更多有关于 黎明 的文章" target="_blank" class="tags8">黎明</a></li>
        <li><a href="{{url('/tags'.'/林俊杰')}}" title="查看更多有关于 林俊杰 的文章" target="_blank" class="tags8">林俊杰</a></li>
        <li><a href="{{url('/tags'.'/汪峰')}}" title="查看更多有关于 汪峰 的文章" target="_blank" class="tags6">汪峰</a></li>
        <li><a href="{{url('/tags'.'/陈百强')}}" title="查看更多有关于 陈百强 的文章" target="_blank" class="tags8">陈百强</a></li>
        <li><a href="{{url('/tags'.'/陈慧琳')}}" title="查看更多有关于 陈慧琳 的文章" target="_blank" class="tags7">陈慧琳</a></li>
        <li><a href="{{url('/tags'.'/李克勤')}}" title="查看更多有关于 李克勤 的文章" target="_blank" class="tags7">李克勤</a></li>
        <li><a href="{{url('/tags'.'/王心凌')}}" title="查看更多有关于 王心凌 的文章" target="_blank" class="tags3">王心凌</a></li>
        <li><a href="{{url('/tags'.'/张国荣')}}" title="查看更多有关于 张国荣 的文章" target="_blank" class="tags0">张国荣</a></li>
        <li><a href="{{url('/tags'.'/张敬轩')}}" title="查看更多有关于 张敬轩 的文章" target="_blank" class="tags8">张敬轩</a></li>
        <li><a href="{{url('/tags'.'/张杰')}}" title="查看更多有关于 张杰 的文章" target="_blank" class="tags3">张杰</a></li>
        <li><a href="{{url('/tags'.'/Beyond')}}" title="查看更多有关于 Beyond 的文章" target="_blank" class="tags4">Beyond</a></li>
        <li><a href="{{url('/tags'.'/雷婷')}}7" title="查看更多有关于 雷婷 的文章" target="_blank" class="tags9">雷婷</a></li>
        <li><a href="{{url('/tags'.'/龚玥')}}" title="查看更多有关于 龚玥 的文章" target="_blank" class="tags2">龚玥</a></li>
        <li><a href="{{url('/tags'.'/王杰')}}" title="查看更多有关于 王杰 的文章" target="_blank" class="tags3">王杰</a></li>
        <li><a href="{{url('/tags'.'/孙燕姿')}}" title="查看更多有关于 孙燕姿 的文章" target="_blank" class="tags8">孙燕姿</a></li>
        <li><a href="{{url('/tags'.'/Twins')}}" title="查看更多有关于 Twins 的文章" target="_blank" class="tags5">Twins</a></li>
        <li><a href="{{url('/tags'.'/孟庭苇')}}" title="查看更多有关于 孟庭苇 的文章" target="_blank" class="tags5">孟庭苇</a></li>
        <li><a href="{{url('/tags'.'/邓丽君')}}" title="查看更多有关于 邓丽君 的文章" target="_blank" class="tags1">邓丽君</a></li>
        <li><a href="{{url('/tags'.'/张靓颖')}}" title="查看更多有关于 张靓颖 的文章" target="_blank" class="tags9">张靓颖</a></li>
        <li><a href="{{url('/tags'.'/冷漠')}}" title="查看更多有关于 冷漠 的文章" target="_blank" class="tags0">冷漠</a></li>
        <li><a href="{{url('/tags'.'/张惠妹')}}" title="查看更多有关于 张惠妹 的文章" target="_blank" class="tags9">张惠妹</a></li>
        <li><a href="{{url('/tags'.'/林忆莲')}}" title="查看更多有关于 林忆莲 的文章" target="_blank" class="tags8">林忆莲</a></li>
        <li><a href="{{url('/tags'.'/五月天')}}" title="查看更多有关于 五月天 的文章" target="_blank" class="tags2">五月天</a></li>
        <li><a href="{{url('/tags'.'/梁静茹')}}" title="查看更多有关于 梁静茹 的文章" target="_blank" class="tags2">梁静茹</a></li>
        <li><a href="{{url('/tags'.'/张玮伽')}}" title="查看更多有关于 张玮伽 的文章" target="_blank" class="tags6">张玮伽</a></li>
        <li><a href="{{url('/tags'.'/周华健')}}" title="查看更多有关于 周华健 的文章" target="_blank" class="tags9">周华健</a></li>
        <li><a href="{{url('/tags'.'/卓依婷')}}" title="查看更多有关于 卓依婷 的文章" target="_blank" class="tags9">卓依婷</a></li>
        <li><a href="{{url('/tags'.'/凤凰传奇')}}" title="查看更多有关于 凤凰传奇 的文章" target="_blank" class="tags7">凤凰传奇</a></li>
        <li><a href="{{url('/tags'.'/林志炫')}}" title="查看更多有关于 林志炫 的文章" target="_blank" class="tags6">林志炫</a></li>
        <li><a href="{{url('/tags'.'/郑源')}}" title="查看更多有关于 郑源 的文章" target="_blank" class="tags7">郑源</a></li>
        <li><a href="{{url('/tags'.'/庄心妍')}}" title="查看更多有关于 庄心妍 的文章" target="_blank" class="tags5">庄心妍</a></li>
        <li><a href="{{url('/tags'.'/陈小春')}}" title="查看更多有关于 陈小春 的文章" target="_blank" class="tags8">陈小春</a></li>
        <li><a href="{{url('/tags'.'/张宇')}}" title="查看更多有关于 张宇 的文章" target="_blank" class="tags2">张宇</a></li>
        <li><a href="{{url('/tags'.'/许嵩')}}" title="查看更多有关于 许嵩 的文章" target="_blank" class="tags0">许嵩</a></li>
        <li><a href="{{url('/tags'.'/蔡依林')}}" title="查看更多有关于 蔡依林 的文章" target="_blank" class="tags0">蔡依林</a></li>
        <li><a href="{{url('/tags'.'/伍佰')}}" title="查看更多有关于 伍佰 的文章" target="_blank" class="tags6">伍佰</a></li>
        <li><a href="{{url('/tags'.'/蔡健雅')}}" title="查看更多有关于 蔡健雅 的文章" target="_blank" class="tags3">蔡健雅</a></li>
        <li><a href="{{url('/tags'.'/薛之谦')}}" title="查看更多有关于 薛之谦 的文章" target="_blank" class="tags1">薛之谦</a></li>
        <li><a href="{{url('/tags'.'/周笔畅')}}" title="查看更多有关于 周笔畅 的文章" target="_blank" class="tags4">周笔畅</a></li>
        <li><a href="{{url('/tags'.'/张信哲')}}" title="查看更多有关于 张信哲 的文章" target="_blank" class="tags9">张信哲</a></li>
    </ul>

</dd>
</dl>

<dl class="wupd"> 
<div class="notice"> 
        <a href="{{url('vip')}}"><img src="{{url('index_files/upan.jpg')}}" width="336" height="336"></a>
</div>
    </dl> 
<div id="box">   
<div id="float" class="div1 div2">     
 
</div>   
</div>
<script>
    (function(){    
    var oDiv=document.getElementById("float");    
    var H=0,iE6;    
    var Y=oDiv;    
    while(Y){H+=Y.offsetTop;Y=Y.offsetParent};    
    iE6=window.ActiveXObject&&!window.XMLHttpRequest;    
    if(!iE6){    
        window.onscroll=function()    
        {    
            var s=document.body.scrollTop||document.documentElement.scrollTop;    
            if(s>H){oDiv.className="div1 div2";if(iE6){oDiv.style.top=(s-H)+"px";}}    
            else{oDiv.className="div1";}        
        };    
    }    
})();
</script>
</div>

<div class="clear"></div>

</div>