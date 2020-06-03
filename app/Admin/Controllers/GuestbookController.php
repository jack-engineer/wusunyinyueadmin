<?php

namespace App\Admin\Controllers;

use App\Models\Guestbook;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class GuestbookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Guestbook';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Guestbook());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->display(function($user_id){
            if($user_id){
                return \App\Models\User::find($user_id)->username;
            }else{
                return "无名氏";
            }
        });;
        $grid->column('content', __('Content'));
        $grid->column('status', __('Status'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id','desc');
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
        $show = new Show(Guestbook::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('content', __('Content'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Guestbook());

        $form->number('user_id', __('User id'));
        $form->textarea('content', __('Content'));
        $form->switch('status', __('Status'))->default(1);

        return $form;
    }
}
