<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.index'))
            ->description(trans('admin.description'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header(trans('admin.detail'))
            ->description(trans('admin.description'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header(trans('admin.edit'))
            ->description(trans('admin.description'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.create'))
            ->description(trans('admin.description'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('ID');
        $grid->id('id');
        $grid->username('username');
        $grid->password('password');
        $grid->email('email');
        $grid->nickname('nickname');
        $grid->qq('qq');
        $grid->wechat('wechat');
        $grid->phone('phone');
        $grid->coin('coin')->sortable();
        $grid->remark('remark');
        $grid->expiration_date('expiration_date');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

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

        $show->id('ID');
        $show->id('id');
        $show->username('username');
        $show->password('password');
        $show->email('email');
        $show->nickname('nickname');
        $show->qq('qq');
        $show->wechat('wechat');
        $show->phone('phone');
        $show->coin('coin');
        $show->remark('remark');
        $show->expiration_date('expiration_date');
        $show->created_at(trans('admin.created_at'));
        $show->updated_at(trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User);

        $form->display('ID');
        $form->text('id', 'id');
        $form->text('username', 'username');
        $form->text('password', 'password');
        $form->text('email', 'email');
        $form->text('nickname', 'nickname');
        $form->text('qq', 'qq');
        $form->text('wechat', 'wechat');
        $form->text('phone', 'phone');
        $form->text('coin', 'coin');
        $form->text('remark', 'remark');
        $form->text('expiration_date', 'expiration_date');
        $form->display(trans('admin.created_at'));
        $form->display(trans('admin.updated_at'));

        return $form;
    }
}
