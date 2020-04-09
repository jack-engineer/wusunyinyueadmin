@extends('member.memberlayout')
@section('fr')
      <div class="jifen">
      	<div class="fl jfbox">
        	<img src="{{asset('images/nouserpic.gif')}}" class="fl" width="60" height="60">
            <div class="hyxx">
            	<span class="bold">{{Auth::guard('web')->user()->username}}</span><br>
                <span class="corg">{{getTitleFromId(Auth::guard('web')->user()->userrole_id,'userroles')}}</span><br>
                <span class="c666">注册时间: {{Auth::guard('web')->user()->created_at}}</span>
                
                @if(!empty(Auth::guard('web')->user()->expiration_date) )
                <span class="c666">过期时间: {{Auth::guard('web')->user()->expiration_date}}</span>
                @if(Auth::guard('web')->user()->expiration_date < now())
                  <span style="color:red;font-weight:bold">(已过期)</span>
                @endif
                @else
                <span class="c666">过期时间: 长期有效</span>
                @endif

            </div>
        </div>
        <div class="jfz fl">
        <strong><a href="{{url('member/coinlog')}}"><font color="red">我的积分：{{Auth::guard('web')->user()->coin}}</font></a></strong><br>
        <strong><a href="{{url('buygroup')}}"><font color="red">升级会员</font></a></strong><br>
        尊享真正的无损音乐！<br>
        高品质，高保真！ <br>

        </div>
        <div class="clearfix"></div>
      </div>
      <h3>帐户安全 <span class="f12 noBold c999">我们会对您的个人资料隐私加以保密</span></h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      提升您的帐户安全,保护您的资金安全!
	  </div>
      <div class="anquan">
      	<div class="aqbox fl">
        	<p class="center">您的安全等级</p>
            <div class="aqpic aqpic50">
            </div>
        </div>
        <div class="aqyz fl c666">
        	<ul>
              @if(empty(Auth::guard('web')->user()->phone))
              <li><span class="w90"><i class="aqicon aqwarn"></i>手机号</span><span class="w70 corg">未设置</span><span class="w250 c999">设置手机号,我们会提醒您一些信息!</span><span class="fr w90"><a href="{{url('member/editinfo')}}" class="cblue">修改</a></span><div class="clearfix"></div></li>
              @else
              <li><span class="w90"><i class="aqicon aqsuccess"></i>手机号</span><span class="w70">已经设置</span><span class="w250 c999">{{Auth::guard('web')->user()->phone}}</span><span class="fr w90"><a href="{{url('member/editinfo')}}" class="cblue">修改</a></span><div class="clearfix"></div></li>
              @endif

              @if(empty(Auth::guard('web')->user()->email))
                <li><span class="w90"><i class="aqicon aqwarn"></i>邮箱</span><span class="w70 corg">未设置</span><span class="w250 c999">设置邮箱,我们会提醒您一些信息!</span><span class="fr w90"><a href="{{url('member/editsafeinfo')}}" class="cblue">修改</a></span><div class="clearfix"></div></li>
              @else
                <li><span class="w90"><i class="aqicon aqsuccess"></i>邮箱</span><span class="w70">已设置</span><span class="w250 c999">您验证的邮箱: {{Auth::guard('web')->user()->email}}</span><span class="fr w90"><a href="{{url('member/editsafeinfo')}}" class="cblue">修改</a></span><div class="clearfix"></div></li>
              @endif
                <li><span class="w90"><div class="clearfix"></div></span></li>
            </ul>
        </div>
        <div class="clearfix"></div>
      </div>
@endsection
