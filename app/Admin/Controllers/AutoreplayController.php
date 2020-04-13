<?php

namespace App\Admin\Controllers;

use App\Models\Autoreplay;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AutoreplayController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Autoreplay';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Autoreplay());

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
        $show = new Show(Autoreplay::findOrFail($id));

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
        $form = new Form(new Autoreplay());

        $form->select('weixin_id', __('Weixin id'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getweixins');
        $form->text('keyword', __('Keyword'));
        $form->textarea('content', __('Content'));

        return $form;
    }
}
