@extends('member.memberlayout')
@section('fr')
<div class="fr rmain">
      <h3>积分记录</h3>
      <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>
      积分记录都可以在这里看到呦!
	  </div>
      <div class="addresslist">
        <table>
        <thead>
        <tr>
        <th style="width:80px">时间</th>
        <th>内容</th>
        <th style="width:50px">积分变动</th>
        <th style="width:50px">
          积分余额
        </th>
        </tr>
        </thead>
        <tbody>
        @if(count($coinlog)>0)
        @foreach($coinlog as $u)
        <tr>
            <td>{{subtext($u->created_at,16,'')}}</td>
            <td>{!!$u->content!!}</td>
            <td>{{$u->coinlog}}</td>
            <td>{{$u->coinlogafter}}</td>
        </tr>
        @endforeach
        @else
          <tr>
            <td colspan="4">暂无记录</td>
          </tr>
        @endif
        </tbody>
        </table>
      </div>
    </div>
@endsection
