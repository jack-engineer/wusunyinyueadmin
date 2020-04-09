@extends('member.memberlayout')
@section('fr')

    <div class="fr rmain">
      <h3>我的站内消息</h3>
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
            <div class="addresslist" style="margin:0">
                        <table style="border:none">
                        <thead>
                        <tr>
                            <th class="" style="width:120px">消息标题</th>
                            <th class=""style="text-align:left">内容</th>
                            <th style="width:120px">状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($getMessage)>0)
                        @foreach($getMessage as $m)
                            <tr style="border-bottom:1px solid ">
                                <td class="left">{!!$m->title!!}</td>
                                <td class="row" style="text-align:left">{!!$m->content!!}</td>
                                <td class="left" >
                                {{subtext($m->created_at,16,'')}} <br>
                                    @if($m->status)
                                        <span class="label label-success" style="color:green">已读</span>
                                    @else
                                        <span class="label label-danger" style="color:red">未读</span>
                                    @endif<a href="{{url('member/msg/del/'.$m->id)}}" style="color:red" onclick="return confirm('确认要删除?');">删除</a>
                                <a href="{{url('member/msg/read/'.$m->id)}}" style="color:black" onclick="return confirm('确认已读?');">设置已读</a>
                                </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <div class="tips" style="position:relative; padding-left:30px;"><i class="icon icon-1"></i>        暂时没有未读的消息!	  </div>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3" class="left">说明： 站内消息</td>
                        </tr>
                        </tbody>
                        </table>
            </div>
        </div>
    </div>
    
@endsection

