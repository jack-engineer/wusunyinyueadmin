<?php

namespace App\Admin\Controllers;

use App\Models\Message;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MessageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Message';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Message());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('from_uid', __('From uid'));
        $grid->column('to_uid', __('To uid'));
        $grid->column('type', __('Type'));
        $grid->column('status', __('Status'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        
        $grid->model()->orderBy('id', 'desc');
        $grid->quickSearch('to_uid');
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
        $show = new Show(Message::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
        $show->field('from_uid', __('From uid'));
        $show->field('to_uid', __('To uid'));
        $show->field('type', __('Type'));
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
        $form = new Form(new Message());

        $form->text('title', __('Title'));
        $form->editor('content', __('Content'));
        $form->text('from_uid', __('发消息人 '))->default('sys_manager_'.\Admin::user()->id);

        // $form->select('to_uid', __('发消息给'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getusers');
        $form->multipleSelect('to_uid')->options(function(){
            return \App\Models\User::all()->pluck('username', 'id');
        });

        // // 通过闭包设置options
        // $form->checkbox('to_uid')->options(function () {
        //     return \App\Models\User::all()->pluck('username', 'id');
        // })->canCheckAll();
        
        $form->text('type', __('消息类型'))->default('sys');
        $form->switch('status', __('状态'))->disable();

      

        return $form;
    }

    public function store1(){
        $form = new Form(new Message());

        dd($form->post());
    }
}
