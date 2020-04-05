<?php

namespace App\Admin\Controllers;

use App\Models\Weixinconfig;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WeixinconfigController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Weixinconfig';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Weixinconfig());

        $grid->column('id', __('Id'));
        $grid->select('weixin_id', __('Weixin id'));
        $grid->column('welcometext', __('Welcometext'));
        $grid->column('defaulttext', __('Defaulttext'));
        $grid->column('returnnum', __('Returnnum'));
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
        $show = new Show(Weixinconfig::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('weixin_id', __('Weixin id'));
        $show->field('welcometext', __('Welcometext'));
        $show->field('defaulttext', __('Defaulttext'));
        $show->field('returnnum', __('Returnnum'));
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
        $form = new Form(new Weixinconfig());

        $form->column(2/3, function ($form) {

            
            $form->select('weixin_id', __('Weixin id'))->options('/admin/api/getweixins')->width(2);
            $form->text('welcometext', __('Welcometext'));
            $form->editor('defaulttext', __('Defaulttext'));
            $form->number('returnnum', __('Returnnum'))->default(3);
            
        });
            return $form;
    }
}
