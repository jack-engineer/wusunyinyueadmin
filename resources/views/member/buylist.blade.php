@extends('member.memberlayout')
@section('fr')
<div class="fr rmain">
      <h3>充值记录</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      在线充值,红包充值记录都可以在这里看到呦!
	  </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th class="w100 phonehide">充值时间</th>
        <th class="w6 phonehide">充值类型</th>
        <th class="">充值金额</th>
        <th class="w90 phonehide">有效期</th>
        </tr>
        </thead>
        <tbody>
        @if(count($userorder)>0)
        @foreach($userorder as $u)
        <tr>
            <td>{{subtext($u->created_at,16,'')}}</td>
            <td>{{$u->order_type}}</td>
            <td>{{$u->money}}</td>
            <td>{{$u->expiration_date}}</td>
        </tr>
        @endforeach
        @else
          <tr>
            <td colspan="4">暂无充值记录</td>
          </tr>
        @endif
        </tbody>
        </table>
      </div>
    </div>
@endsection
