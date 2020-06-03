<?php

namespace App\Admin\Controllers;

use App\Models\Weixin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class WeixinController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Weixin';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Weixin());

        $grid->column('id', __('Id'));
        $grid->column('weixintitle', __('Weixintitle'));
        $grid->column('AppID', __('AppID'));
        // $grid->column('AppSecret', __('AppSecret'));
        $grid->column('Token', __('Token'));
        // $grid->column('EncodingAESKey', __('EncodingAESKey'));
        $grid->column('welcometext', __('Welcometext'));
        $grid->column('defaulttext', __('Defaulttext'));
        $grid->column('returnnum', __('Returnnum'));
        $grid->column('laststr', __('Laststr'));
        $grid->column('returnCategory', __('ReturnCategory'));
        // $grid->column('deleted_at', __('Deleted at'));
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
        $show = new Show(Weixin::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('weixintitle', __('Weixintitle'));
        $show->field('AppID', __('AppID'));
        $show->field('AppSecret', __('AppSecret'));
        $show->field('Token', __('Token'));
        $show->field('EncodingAESKey', __('EncodingAESKey'));
        $show->field('welcometext', __('Welcometext'));
        $show->field('defaulttext', __('Defaulttext'));
        $show->field('returnnum', __('Returnnum'));
        $show->field('laststr', __('Laststr'));
        $show->field('returnCategory', __('ReturnCategory'));
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
        $form = new Form(new Weixin());

        $form->text('weixintitle', __('Weixintitle'));
        $form->text('AppID', __('AppID'));
        $form->text('AppSecret', __('AppSecret'));
        $form->text('Token', __('Token'));
        $form->text('EncodingAESKey', __('EncodingAESKey'));
        $form->text('welcometext', __('Welcometext'));
        $form->text('defaulttext', __('Defaulttext'));
        $form->number('returnnum', __('Returnnum'));
        $form->text('laststr', __('Laststr'));
        $form->text('returnCategory', __('ReturnCategory'));

        return $form;
    }
}
