<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserQiantaiController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '网站会员管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        // $grid->column('parent_id', __('Parent id'));
        $grid->column('username', __('Username'));
        $grid->column('password', __('Password'));
        $grid->column('email', __('Email'));
        $grid->column('name', __('Name'));
        $grid->column('qq', __('Qq'));
        $grid->column('wechat', __('Wechat'));
        $grid->column('phone', __('Phone'));
        $grid->column('coin', __('Coin'));
        // $grid->column('remark', __('Remark'));
        // $grid->column('path', __('Path'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('expiration_date', __('Expiration date'))->date('Y-m-d');
        $grid->model()->orderBy('id', 'desc');
        
        $grid->quickSearch('username','email','name');
        $grid->actions(function ($actions) {

            // 去掉删除
            $actions->disableDelete();
        
            // 去掉编辑
            $actions->disableEdit();
        
            // 去掉查看
            // $actions->disableView();
        });
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('email', __('Email'));
        $show->field('name', __('Name'));
        $show->field('qq', __('Qq'));
        $show->field('wechat', __('Wechat'));
        $show->field('phone', __('Phone'));
        $show->field('coin', __('Coin'));
        $show->field('remark', __('Remark'));
        $show->field('path', __('Path'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('expiration_date', __('Expiration date'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->number('parent_id', __('Parent id'));
        $form->text('username', __('Username'));
        $form->password('password', __('Password'));

        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        $form->email('email', __('Email'));
        $form->text('name', __('Name'))->default('爱上无损音乐');
        $form->text('qq', __('Qq'));
        $form->text('wechat', __('Wechat'));
        $form->mobile('phone', __('Phone'));
        $form->number('coin', __('Coin'));
        $form->editor('remark', __('Remark'));
        $form->text('path', __('Path'));
        $form->date('expiration_date', __('Expiration date'))->default(date('Y-m-d'));

        return $form;
    }

    public function upload(Request $request)
    {
        $urls = [];

        foreach ($request->file() as $file) {
            $path = $file->store('images');
            $urls[] = Storage::url($path);
        }

        return [
            "errno" => 0,
            "data"  => $urls,
        ];
    }
}
