@extends('qiantai.form')
@section('loginregisterform')
<div class="hymain">
  <div class="block">
  	<div class="fl leftside">
      <h3>帐户管理</h3>
      <ul>
        <li><a href="{{url('/')}}" {!! Request::is('member') ? ' class="hover"' : '' !!}>返回首页</a></li>
        <li><a href="{{url('member')}}" {!! Request::is('member') ? ' class="hover"' : '' !!}>帐户信息</a></li>
        <li><a href="{{url('member/editsafeinfo')}}" {!! Request::is('member/editsafeinfo') ? ' class="hover"' : '' !!}>帐户安全</a></li>
        <li><a href="{{url('member/msg')}}" {!! Request::is('member/msg') ? ' class="hover"' : '' !!} >站内消息</a></li>
        <li><a href="{{url('member/editinfo')}}" {!! Request::is('member/editinfo') ? ' class="hover"' : '' !!}>个人资料</a></li>
      </ul>
      <h3>财务信息</h3>
      <ul>
      	 <li><b><a href="{{url('member/buygroup')}}" {!! Request::is('member/buygroup') ? ' class="hover"' : '' !!}>升级会员组</a></b></li>
         <!-- <li><a href="/e/payapi/">余额/充值</a></li>-->

        <!--  <li><a href="/e/member/card/">红包充值</a></li>-->
        <li><a href="{{url('member/buylist')}}" {!! Request::is('member/buylist') ? ' class="hover"' : '' !!}>充值记录</a></li>
        <li><a href="{{url('member/coinlog')}}" {!! Request::is('member/coinlog') ? ' class="hover"' : '' !!}>积分记录</a></li>
      </ul>
      <!-- <h3>我的交易</h3>
      <ul>
        <li><a href="/e/ShopSys/ListDd/">我的订单</a></li>
        <li><a href="/e/member/fava/">我的收藏</a></li>
        <li><a href="/e/ShopSys/buycar/" target="_blank">我的购物车</a></li>
        <li><a href="/e/ShopSys/address/ListAddress.php">收货地址管理</a></li>
      </ul> -->

      <!--<h3>我的主页</h3>-->
      <!--<ul>-->
      <!--  <li><a href="https://www.wsyyxz.com/e/space/?userid=86502">预览我的主页</a></li>-->
      <!--  <li><a href="https://www.wsyyxz.com/e/member/mspace/SetSpace.php">设置我的主页</a></li>-->
      <!--  <li><a href="https://www.wsyyxz.com/e/member/mspace/ChangeStyle.php">选择主页模板</a></li>-->
      <!--  <li><a href="https://www.wsyyxz.com/e/member/mspace/gbook.php">管理主页留言</a></li>-->
      <!--  <li><a href="https://www.wsyyxz.com/e/member/mspace/feedback.php">管理主页反馈</a></li>-->
      <!--</ul>-->
      <div class="shousuo">展<br>开<br>菜<br>单</div>
</div>  	
<div class="fr rmain noborder">
@yield("fr")
</div>
  	<div class="clearfix"></div>
  </div>
</div>
<script>
//导航栏 填充 title的内容
var a = "会员中心";
$("title").text(a);
</script>
@endsection