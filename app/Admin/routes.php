<?php

use Illuminate\Routing\Router;



Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->get('/', 'HomeController@index')->name('admin.home');
    // 用户管理
    $router->resource('users', UserQiantaiController::class);
    // 微信配置管理
    $router->resource('weixinconfigs', WeixinconfigController::class);
    // 微信管理
    $router->resource('weixins', WeixinController::class);
    // 微信自动回复
    $router->resource('auto_replays', Autoreplays::class);
    // 文章管理
    $router->resource('articles', ArticleController::class);
    // 栏目管理
    $router->resource('categories', CategoryController::class);
    // 用户组管理
    $router->resource('userroles', UserroleController::class);
    // 单页管理
    $router->resource('pages', PageController::class);
    // 留言本管理
    $router->resource('guestbooks', GuestbookController::class);
    // 公告管理
    $router->resource('notices', NoticeController::class);
    // 消息管理
    $router->resource('messages', MessageController::class);
    // 消息模板管理
    $router->resource('messagetemplates', MessagetemplateController::class);
    //用户订单管理
    $router->resource('userorders', UserorderController::class);
    // 用户积分记录
    $router->resource('usercoinlogs', UsercoinlogController::class);
    // 评论管理
    $router->resource('comments', CommentController::class);
    // 标签云管理
    $router->resource('tags', TagController::class);
    // 系统配置
    $router->resource('configs', ConfigController::class);
    // 菜单管理
    $router->resource('menus', MenuController::class);

    $router->get('usersetting','UserQiantaiController@setting');
    
    // wangEditor富文本编辑器上传图片路由
    $router->any('upload',"UserQiantaiController@upload");
});
