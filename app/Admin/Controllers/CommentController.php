<?php

namespace App\Admin\Controllers;

use App\Models\Comment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Comment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'))->display(function($user_id){
            $user = \App\Models\User::find($user_id);
            if($user){
                return $user->username;
            }else{
                return $user_id;
            }
        });
        $grid->column('article_id', __('Article id'))->display(function($article_id){
            $a = \App\Models\Article::find($article_id);
            if($a){
                return $a->title;
            }else{
                return $article_id;
            }
        });
        $grid->column('content', __('Content'));
        $grid->column('status', __('Status'));
        // $grid->column('deleted_at', __('Deleted at'));
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
        $show = new Show(Comment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('article_id', __('Article id'));
        $show->field('content', __('Content'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Comment());

        $form->select('user_id', __('User id'))->options('/'.env('ADMIN_ROUTE_PREFIX').'/api/getusers');
        $form->number('article_id', __('Article id'));
        $form->textarea('content', __('Content'));
        $form->switch('status', __('Status'));

        return $form;
    }
}
