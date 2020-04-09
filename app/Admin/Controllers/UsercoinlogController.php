<?php

namespace App\Admin\Controllers;

use App\Models\Usercoinlog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsercoinlogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Usercoinlog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Usercoinlog());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->display(function($user_id){
            return \App\Models\User::find($user_id)->username;
        });
        $grid->column('content', __('Content'));
        $grid->column('coinlog', __('Coinlog'));
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
        $show = new Show(Usercoinlog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'))->as(function($user_id){
            return \App\Models\User::find($user_id)->username;
        });
        $show->field('content', __('Content'));
        $show->field('coinlog', __('Coinlog'));
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
        $form = new Form(new Usercoinlog());

        $form->number('user_id', __('User id'));
        $form->textarea('content', __('Content'));
        $form->text('coinlog', __('Coinlog'));

        return $form;
    }
}
