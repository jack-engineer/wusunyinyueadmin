<?php

namespace App\Admin\Controllers;

use App\Models\Userorder;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Controllers\Dashboard;

use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class UserorderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户订单管理';

    public function indexd(Content $content){
        return $content
        ->title('asdfasdfasdf')
        ->description('asdfasdfasdf...')
        ->row('Dashboard::title()')
        ->row(function (Row $row) {

            $row->column(4, function (Column $column) {
                $column->append('asdfasdf');
            });

            $row->column(4, function (Column $column) {
                $column->append('asdf');
            });

            $row->column(4, function (Column $column) {
                $column->append('asdf');
            });
        });
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Userorder());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->display(function($user_id){
            return \App\Models\User::find($user_id)->username;
        });
        $grid->column('order_type', __('Order type'));
        $grid->column('money', __('Money'));
        $grid->column('expiration_date', __('Expiration date'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id', 'desc');
        $grid->actions(function ($actions) {
            // 去掉删除
            // $actions->disableDelete();
            // 去掉编辑
            $actions->disableEdit();
            // 去掉查看
            // $actions->disableView();
        });
        if (!\Admin::user()->can('显示导出数据')) {
            $grid->disableExport();
        }
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Userorder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('order_type', __('Order type'));
        $show->field('money', __('Money'));
        $show->field('expiration_date', __('Expiration date'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Userorder());
        $form->select('user_id', __('选择用户'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getusers');
        $form->radio('order_type', __('支付方式'))->options(['支付宝'=>'支付宝','微信'=>'微信'])->default('微信');
        $form->decimal('money', __('金额'))->default(100);
        $form->date('expiration_date', __('过期时间'))->default(date('Y-m-d'));
        $form->select('userrole_id',__('用户组'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getuserroles');
        //保存后回调
        $form->saved(function (Form $form) {
            $user = User::find($form->model()->user_id);
            $user->userrole_id = $form->model()->userrole_id;
            $user->expiration_date = $form->model()->expiration_date;
            $user->save();
        });
        
        // 忽略掉不需要保存的字段
        // $form->ignore(['userrole_id']);
        $form->setWidth(3);
        return $form;
    }
}
