<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MenuController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Menu';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Menu());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('url', __('Url'));
        $grid->column('type', __('Type'));
        $grid->column('type_id', __('Type id'));
        $grid->column('order', __('Order'));
        $grid->column('keywords', __('Keywords'));
        $grid->column('description', __('Description'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
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
        $show = new Show(Menu::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('url', __('Url'));
        $show->field('type', __('Type'));
        $show->field('type_id', __('Type id'));
        $show->field('order', __('Order'));
        $show->field('keywords', __('Keywords'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Menu());

        $form->text('title', __('Title'));
        $form->url('url', __('Url'));
        $form->text('type', __('Type'));
        $form->number('type_id', __('Type id'));
        $form->number('order', __('Order'));
        $form->text('keywords', __('Keywords'));
        $form->text('description', __('Description'));

        return $form;
    }
}
