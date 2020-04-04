<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('category_id', __('Category id'))->display(function($category_id){
            return \App\Models\Category::find($category_id)->title;
        });
        $grid->column('title', __('Title'));
        $grid->column('author', __('Author'));
        $grid->column('downlink', __('Downlink'));
        $grid->column('downpassword', __('Downpassword'));
        $grid->column('content', __('Content'));
        $grid->column('hits', __('Hits'));
        $grid->column('downtimes', __('Downtimes'));
        $grid->column('manager_id', __('Manager id'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id','desc');

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'))->as(function($category_id){
            return \App\Models\Category::find($category_id)->title;
        });
        $show->field('title', __('Title'));
        $show->field('author', __('Author'));
        $show->field('downlink', __('Downlink'));
        $show->field('downpassword', __('Downpassword'));
        $show->field('content', __('Content'));
        $show->field('hits', __('Hits'));
        $show->field('downtimes', __('Downtimes'));
        $show->field('manager_id', __('Manager id'));
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
        $form = new Form(new Article());

        // $form->number('category_id', __('Category id'));

        $form->select('category_id')->options('/api/categories');

        $form->text('title', __('Title'));
        $form->text('author', __('Author'));
        $form->text('downlink', __('Downlink'));
        $form->text('downpassword', __('Downpassword'));
        $form->textarea('content', __('Content'));
        $form->number('hits', __('Hits'))->default(1);
        $form->number('downtimes', __('Downtimes'));
        $form->number('manager_id', __('Manager id'));

        return $form;
    }
}
