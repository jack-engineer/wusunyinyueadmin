<?php

namespace App\Admin\Controllers;

use App\Models\Auto_replay;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Autoreplays extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Auto_replay';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Auto_replay());

        $grid->column('id', __('Id'));
        $grid->column('weixin_id', __('Weixin id'));
        $grid->column('keyword', __('Keyword'));
        $grid->column('content', __('Content'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Auto_replay::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('weixin_id', __('Weixin id'));
        $show->field('keyword', __('Keyword'));
        $show->field('content', __('Content'));
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
        $form = new Form(new Auto_replay());

        $form->number('weixin_id', __('Weixin id'));
        $form->text('keyword', __('Keyword'));
        $form->textarea('content', __('Content'));

        return $form;
    }
}
