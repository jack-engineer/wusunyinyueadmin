<?php

namespace App\Admin\Controllers;

use App\Models\Usercoinlog;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsercoinlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Usercoinlog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Usercoinlog());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->display(function($user_id){
            return \App\Models\User::find($user_id)->username;
        });
        $grid->column('content', __('Content'));
        $grid->column('coinlog', __('Coinlog'));
        $grid->column('coinlogafter', __('Coinlogafter'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id','desc');

        $grid->actions(function ($actions) {
            // 去掉删除
            // $actions->disableDelete();
            // 去掉编辑
            $actions->disableEdit();
            // 去掉查看
            // $actions->disableView();
        });

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
        $show = new Show(Usercoinlog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'))->as(function($user_id){
            return \App\Models\User::find($user_id)->username;
        });
        $show->field('content', __('Content'));
        $show->field('coinlog', __('Coinlog'));
        $show->field('coinlogafter', __('Coinlogafter'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        // 详情页右上角的三个操作按钮
        $show->panel()
        ->tools(function ($tools) {
            // $tools->disableEdit();
            // $tools->disableList();
            // $tools->disableDelete();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Usercoinlog());

        $form->select('user_id', __('选择用户'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getusers');
        $form->textarea('content', __('Content'));
        $form->text('coinlog', __('Coinlog'));
        
        //保存后回调
        $form->saved(function (Form $form) {
           $userid = $form->user_id;
           $coin = $form->coinlog;
           $user = User::findOrFail($userid);
           $user->coin += $coin;
           $user->save();

            //  用户积分变动后的值 coinlogafter 等于 该用户现在的值
           $usercoinlog = Usercoinlog::find($form->model()->id);
           $usercoinlog->coinlogafter = $user->coin;
           $usercoinlog->save();
        });

        return $form;
    }
}
