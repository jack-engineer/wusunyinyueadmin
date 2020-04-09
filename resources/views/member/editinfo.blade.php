@extends('member.memberlayout')
@section('fr')
      <div class="fr rmain">
            <h3>个人资料 <span class="f12 noBold c999">我们会对您的个人资料隐私加以保密</span></h3>
            <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
            完善个人档案，不仅可以帮助我们给您提供个性化服务，更方便您在购物中的信息自动处理！
            </div>
            <div class="yuer f12 p20 pt5">会员名: <span class="csh">{{Auth::guard('web')->user()->username}}</span></div>
            <div class="tab">
                <div class="ddsearch fr"><a href="#" class="c4095ce">隐私申明&gt;&gt;</a></div>
                <ul>
                <li class="tabhover"><a href="{{url('member/editinfo')}}">基本信息</a></li>
                <li><a href="{{url('member/editsafeinfo')}}">密码修改</a></li>
                <div class="clearfix"></div>
                </ul>
            </div>
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
            <form name="userinfoform"  method="post"  action="{{url('member/editinfo')}}">
                {!!csrf_field()!!}
                <div id="edituserxx">
                    <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
                        <tbody>
                            <tr>
                                <td width="" height="25" bgcolor="" style="width: 100px;">真实姓名</td><td bgcolor="" width="">
                                <input name="name" type="text" id="name" value="{{Auth::guard('web')->user()->name}}">
                                </td>
                            </tr>
                            <tr>
                                <td width="" height="25" bgcolor="" style="width: 100px;">手机</td><td bgcolor="" width="">
                                    <input name="phone" type="text" id="phone" value="{{Auth::guard('web')->user()->phone}}">
                                </td>
                            </tr>
                            <tr>
                                <td width="" height="25" bgcolor="" style="width: 100px;">QQ号码</td><td bgcolor="" width="">
                                    <input name="qq" type="text" id="qq" value="{{Auth::guard('web')->user()->qq}}">
                                </td>
                            </tr>
                        </tbody>
                    </table>	  
                    <div class="pl78"><input type="submit" name="Submit" value="修改信息" class="button small gray"></div>
                </div>
            </form>    
        </div>
@endsection