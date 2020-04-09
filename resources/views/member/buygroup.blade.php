@extends('member.memberlayout')
@section('fr')
      <div class="fr rmain">
      <h3>账户信息</h3>
      <div class="yuer f12 p20">会员等级: <span class="csh">普通用户</span><span class="ml30">可用余额: <span class="csh f20">￥0.00</span></span> <span class="ml30">剩余积分: <span class="csh f20">0</span></span></div>
      <div class="tab">
        <div class="ddsearch fr"><a href="#" class="c4095ce">充值帮助&gt;&gt;</a></div>
        <ul>
          <li class="tabhover"><a href="#">购买会员组</a></li>
          <div class="clearfix"></div>
        </ul>
      </div>
<form name="payform" method="post" action="../../payapi/BuyGroupPay.php">
      <div id="edituserxx">
          <table width="100%" align="center" cellpadding="3" cellspacing="0" bgcolor="">
            <tbody>
    
                  <tr>
                <td width="" height="25" bgcolor="" style="width: 100px;"><input type="radio" name="id" value="1"></td>
                <td bgcolor="" width="">68              元 （ 
              半年会员              ） 下载权限：FLAC,WAV,APE,稀有无损  免费下载：60个/天</td>
              </tr>
                  <tr>
                <td width="" height="25" bgcolor="" style="width: 100px;"><input type="radio" name="id" value="2"></td>
                <td bgcolor="" width="">98              元 （ 
              年度会员              ） 下载权限：FLAC,WAV,APE,稀有无损  免费下载：60个/天</td>
              </tr>
                  <tr>
                <td width="" height="25" bgcolor="" style="width: 100px;"><input type="radio" name="id" value="3"></td>
                <td bgcolor="" width="">258              元 （ 
              超级会员              ） 下载权限：Hi-Res,FLAC,WAV,APE,稀有无损  免费下载：120个/天</td>
              </tr>
                  <tr>
                <td width="" height="25" bgcolor="" style="width: 100px;"><input type="radio" name="id" value="4"></td>
                <td bgcolor="" width="">588              元 （ 
              至尊会员              ） 下载权限：DSD,Hi-Res,FLAC,WAV,APE,稀有无损 免费下载：300个/天。<br>
赠送5T无损音乐打包合集，赠送128G超高品质车载U盘。</td>
              </tr>
                </tbody>
          </table>
        </div>
      <div id="chongzhi" class="pl20">
                <input name="payid" type="hidden" value="6">
                <input name="pay_mode" type="hidden" value="">
                <ul>
                    <li class="payfs"><span class="fl pr30">支付方式：</span><a href="javascript:void();" class="hover" payfs="6" pay_mode=""><span></span>
                    <img src="{{asset('images/zfb.jpg')}}"></a> <a href="javascript:void();" payfs="6" pay_mode="wechat"><span></span>
                    <img src="{{asset('images/wxzf.jpg')}}"></a> <div class="clearfix"></div></li>
                    <li class="center"><input type="button" onclick="javascript:(alert('暂未开放,请联系网站客服人员进行升级！谢谢'))" name="Submit" value="确定支付" class="rbutton"></li>
                </ul>
            
        </div></form>
    </div>
@endsection
