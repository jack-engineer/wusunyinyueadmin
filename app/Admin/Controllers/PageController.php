<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '单页管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());

        $grid->column('id', __('admin.Id'));
        $grid->column('title', __('admin.Title'))->width(200);
        $grid->column('content', __('admin.Content'));
        $grid->column('remark', __('admin.Remark'));
        $grid->column('deleted_at', __('admin.Deleted at'));
        $grid->column('created_at', __('admin.Created at'));
        $grid->column('updated_at', __('admin.Updated at'));
        if (!\Admin::user()->can('显示导出数据')) {
            $grid->disableExport();//去掉导出数据
            // $grid->disableBatchActions();// 去掉批量操作
            // $grid->disableActions();  //禁止行级右侧的所有操作按钮
            // $grid->disableCreateButton(); //禁止新建按钮
            // $grid->disableRowSelector();  //进行行选择按钮
            // $grid->disableTools();  //禁止工具栏
            // $grid->disablePagination(); //禁止分页
            
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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', __('admin.Id'));
        $show->field('title', __('admin.Title'));
        $show->field('content', __('admin.Content'));
        $show->field('remark', __('admin.Remark'));
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
        $form = new Form(new Page());

        $form->text('title', __('admin.Title'));
        $form->editor('content', __('admin.Content'));
        $form->text('remark', __('admin.Remark'));

        return $form;
    }
}
