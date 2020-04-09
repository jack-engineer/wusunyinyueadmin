<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
<title>会员登录/注册</title>
<link href="{{asset('login_files/common.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('login_files/yecha.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('login_files/yecha.js')}}"></script>
</head>
<body>
<div class="topnav">
    	<div class="block">
        	<div class="fl">
	<a href="{{url('logout')}}">退出</a> 
	<a href="{{url('/')}}">返回首页</a> 
            </div>
            <div class="fr">
            	<ul>
                	<li><a href="{{url('vip')}}">充值</a></li>
                    <!-- <li>|</li> -->
                    <!-- <li class="dropdown"><span class="dropindex"><a href="{{url('member')}}">我的帐户</a><span class="arrow"></span></span>
                    	<ul>
                        	<li><a href="https://www.wsyyxz.com/e/ShopSys/ListDd/">我的订单</a></li>
                            <li><a href="https://www.wsyyxz.com/e/payapi/">帐户余额</a></li>
                            <li><a href="https://www.wsyyxz.com/e/member/fava/">我的收藏</a></li>
                            <li><a href="https://www.wsyyxz.com/e/member/my/">会员/积分</a></li>
                            <li><a href="https://www.wsyyxz.com/e/member/EditInfo/">个人资料</a></li> -->
                            <!-- <li><a href="https://www.wsyyxz.com/zhishi/9.html">升级会员</a></li> -->
                        <!-- </ul> -->
                    <!-- </li> --> 
                    <!-- <li>|</li> -->
                    <!-- <li class="dropdown shopcar"><span class="dropindex"><a href="https://www.wsyyxz.com/e/ShopSys/buycar/">购物车</a><span>0</span>件<span class="arrow"></span></span>
                    	<ul>
                        	<li class="buy"><div>购物车共有 <span class="cred">0</span> 件商品</div><a href="https://www.wsyyxz.com/e/ShopSys/buycar/" class="car"></a></li>
                        </ul>
                    </li> -->
                    <!-- <li>|</li>
                    <li><a href="https://www.wsyyxz.com/e/ShopSys/ListDd/">我的订单</a></li>
                    <li>|</li> -->
                    <li><a href="#">帮助</a></li>
                </ul>
            </div>
        </div>
    </div>
	<div class="header">
    	<div class="block">
        	<div class="logo"><a href="{{url('/')}}"></a></div>
            <div class="dhmenu">
            	<div class="morecp">
                	<span class="allfl">会员快捷操作</span>
                	<span class="more"></span>
                    <div class="morecpfl">
                    	<ul>
                        	<li><a href="{{url('member')}}">我的帐号</a></li>
                           
                            <!-- <li><a href="https://www.wsyyxz.com/e/payapi/">财务信息</a></li>
                            <li><a href="https://www.wsyyxz.com/e/ShopSys/ListDd/">我的交易</a></li> -->
                        </ul>
                    </div>                
                </div>
            	<ul class="indexnav">
                	<li class="phonehide"><a href="{{url('/')}}" target="_blank">首页</a></li>
                	<li class="phonelink"><a href="{{url('member')}}">会员中心</a></li>
                    <!-- <li><a href="https://www.wsyyxz.com/e/ShopSys/ListDd/">我的订单</a></li> -->
                    <li class="phonehide"><a href="{{url('member')}}">我的信息</a></li>
                    <!-- <li><a href="https://www.wsyyxz.com/e/member/fava/" class="star">我的收藏</a></li>
                    <li><a href="https://www.wsyyxz.com/e/ShopSys/buycar/">我的购物车</a></li> -->
                    <li><strong><a href="{{url('vip')}}">升级会员</a></strong></li>
                </ul>
            </div>
        </div>
    </div>
@yield('loginregisterform')
<!--<div class="baozheng">
    	<div class="block">
        	<ul>
            	<li class="photoico"><span class="icon"></span>完全实拍,无虚假<br>全国最低价<span class="line"></span></li>
                <li class="mapico"><span class="icon"></span>购物满100元<br>全国包邮<span class="line"></span></li>
                <li class="fhico"><span class="icon"></span>超快速发货<br>全国送货上门<span class="line"></span></li>
                <li class="dayico"><span class="icon"></span>质量问题<br>30日免费退换货<span class="line"></span></li>
            </ul>
        </div>
</div-->
<div class="footxx">
    	<div class="block">
        	<!--<dl><dt>新手指南</dt>
            	<dd><a href="#">购物流程</a></dd>
                <dd><a href="#">付款方式</a></dd>
                <dd><a href="#">在线帮助</a></dd>
            </dl>
            <dl><dt>配送服务</dt>
            	<dd><a href="#">发货时间</a></dd>
                <dd><a href="#">配送时间</a></dd>
                <dd><a href="#">配送费用</a></dd>
            </dl>
            <dl><dt>信誉保证</dt>
            	<dd><a href="#">关于我们</a></dd>
                <dd><a href="#">信誉保证</a></dd>
                <dd><a href="#">退换货保障</a></dd>
                <dd><a href="#">联系我们</a></dd>
            </dl>
            <dl><dt>合作专区</dt>
            	<dd><a href="#">大客户采购</a></dd>
                <dd><a href="#">商务合作</a></dd>
                <dd><a href="#">分销说明</a></dd>
                <dd><a href="#">实体店铺加盟</a></dd>
            </dl>-->
            <dl><dt>客服中心</dt>
            	<dd><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin={{configs('客服QQ')}}&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:372009617:51" alt="点击这里给我发消息" title="点击这里给我发消息"></a></dd>
                <dd>(周一至周五 9:00-18:00)</dd>
                
            </dl>
            <dl>
            	<dt>官方微信:</dt>
            	<dd>
                	{!!configs('微信大图片')!!}
                </dd>
            </dl>
            <div class="clearfix"></div>
        </div>
</div>
<script>
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
		$(".message   a").on('click',function(){
			$(".message").slideUp(600);
		});
	});
</script>
</body></html>