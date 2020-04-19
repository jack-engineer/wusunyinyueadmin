
<h4>系统升级记录</h4>
<ul class="list-unstyled">
    <li>1,增加了会员中心积分余额的功能</li>
    <li>2,增加了升级记录功能</li>
    <li>3,升级了随意更改后台地址的功能 比如： xxx.com/admin  => xxx.com/houtai ,修改需要联系管理员</li>
    <li>4,删除了栏目管理的所需积分。</li>
    <li>5,修改了系统的消息管理，优化数据表，会员新注册，不发系统消息了，可以直接修改消息模板，该消息显示在会员消息列表第一条</li>
    <li>6,增加了积分记录的快速搜索功能，可以快速搜索用户名，查看该用户的积分记录。这里涉及到到不同表中，快速搜索字段，详细代码，请看UsercoinlogController代码中grid()方法。</li>
    <li>7，增加了用户下载记录，所有的下载，都记录下来了。方便数据统计。</li>
</ul>
<br>
<h4>系统使用说明</h4>
<ul class="list-unstyled">
    <li>1，创建用户积分订单和用户订单管理的同时，将自动更改会员的积分和会员组，请谨慎使用。</li>
    <li>2，用户订单管理，用户积分管理，取消修改操作。</li>
    <li>3，关于用户使用积分下载的说明：只有用户权限不足以下载该链接的时候，才会使用积分下载。</li>
    <li>4，批量设置文章下载的所需积分，以及所需用户组，请联系管理员设置。当然也可以单独设置每篇文章的所需权限，和所需积分。</li>
</ul>

