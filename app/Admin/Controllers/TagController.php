<?php

namespace App\Admin\Controllers;

use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Tag';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Tag());

        $grid->column('id', __('admin.Id'));
        $grid->column('title', __('admin.Title'));
        $grid->column('english', __('admin.English'));
        $grid->column('counts', __('admin.Counts'));
        // $grid->column('deleted_at', __('Deleted at'));
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
        $show = new Show(Tag::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('title', __('admin.Title'));
        $show->field('english', __('admin.English'));
        $show->field('counts', __('admin.Counts'));
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
        $form = new Form(new Tag());

        $form->text('title', __('admin.Title'));
        $form->text('english', __('admin.English'));
        $form->number('counts', __('admin.Counts'));

        return $form;
    }
}
