
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>{{$article->title}} - 下载地址</title>
<meta name="keywords" content="{{$article->title}} - 下载地址">
<meta name="description" content="{{$article->title}} - 下载地址">
<style type="text/css">
a						{ text-decoration: none; color: #002280 }
a:hover					{ text-decoration: underline }
body					{ font-size: 9pt; }
table					{ font: 9pt Tahoma, Verdana; color: #000000 }
input,select,textarea	{ font: 9pt Tahoma, Verdana; font-weight: normal; }
select					{ font: 9pt Tahoma, Verdana; font-weight: normal; }
.nav					{ font: 9pt Tahoma, Verdana; color: #000000; font-weight: bold }
.nav a					{ color: #000000 }
.header					{ font: 9pt Tahoma, Verdana; color: #FFFFFF; font-weight: bold; background-color: #4FB4DE }
.header a				{ color: #FFFFFF }
.category				{ font: 9pt Tahoma, Verdana; color: #000000; background-color: #fcfcfc }
.tableborder			{ background: #C9F1FF; border: 1px solid #4FB4DE } 
.singleborder			{ font-size: 0px; line-height: 1px; padding: 0px; background-color: #F8F8F8 }
.smalltxt				{ font: 9pt Tahoma, Verdana }
.outertxt				{ font: 9pt Tahoma, Verdana; color: #000000 }
.outertxt a				{ color: #000000 }
.bold					{ font-weight: bold }

.gg1{ margin:0 auto; text-align:center}
</style>
<link rel="stylesheet" rev="stylesheet" href="{{asset('css/app.css')}}" type="text/css">
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/clipboard.min.js')}}"></script>
</head>
<body>
<br>
<br>
<br>
<br>
<table align="center" width="100%">
  <tbody><tr> 
    <td height="32" align="center"><font size="6">{{$article->title}}</font>
  <a target="_blank" href="{{url('member/downok'.'/'.$article->id)}}" title="{{$article->title}}"><br><br><br>
	<img src="{{asset('images/xiazai.png')}}" border="0">
  </a>
  <br>
	</td>
  </tr>

  <tr>
    <td align="center">
      <div style="text-align:center; margin:20px 0" >
        提取码:<font color="red" size="4px" id="target">{{$article->downpassword}}</font>
        <button class="btn btn-primary" data-clipboard-action="copy" data-clipboard-target="#target" id="copy_btn">    
            点击复制提取码
        </button> 
      </div>
    </td>
  </tr>
  
  <tr>
  <td align="center" style="font-size:16px;font-weight:bold;">温馨提示：如果资源链接失效，请留言回复。WAV资源无法播放的问题，请下载Foobar2000播放器进行转换为flac格式即可<br>
    如有任何问题，请联系本站客服QQ:<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin={{configs('客服QQ')}}&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:372009617:51" alt="点击这里给我发消息" title="点击这里给我发消息"></a>{{configs('客服QQ')}}，或官方微信公众号:{!!configs('官方微信')!!}</td>
  </tr>
  <tr>
	<td align="center">{!!configs('微信大图片')!!}</td>
  </tr>


</tbody></table>
<br>
<div class="gg1">
  
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
</body></html>