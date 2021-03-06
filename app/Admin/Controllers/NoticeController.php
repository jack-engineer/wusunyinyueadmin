<?php

namespace App\Admin\Controllers;

use App\Models\Notice;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NoticeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Notice';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Notice());

        $grid->column('id', __('admin.Id'));
        $grid->column('title', __('admin.Title'));
        $grid->column('content', __('admin.Content'));
        $grid->column('manager_id', __('admin.Manager id'));
        $grid->column('deleted_at', __('admin.Deleted at'));
        $grid->column('created_at', __('admin.Created at'));
        $grid->column('updated_at', __('admin.Updated at'));

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
        $show = new Show(Notice::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('title', __('admin.Title'));
        $show->field('content', __('admin.Content'));
        $show->field('manager_id', __('admin.Manager id'));
        $show->field('deleted_at', __('admin.Deleted at'));
        $show->field('created_at', __('admin.Created at'));
        $show->field('updated_at', __('admin.Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Notice());

        $form->text('title', __('admin.Title'));
        $form->textarea('content', __('admin.Content'));
        $form->number('manager_id', __('admin.Manager id'));

        return $form;
    }
}
