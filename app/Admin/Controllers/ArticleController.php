<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Tag;
use Encore\Admin\Layout\Content;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Article';
    public function indexTest(Content $content){
        dd(Tag::all()->pluck('title', 'id'));
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        // $grid->column('category_id', __('Category id'))->display(function($category_id){
        //     return \App\Models\Category::find($category_id)->title;
        // });
        $grid->column('title', __('Title'));
        $grid->column('author', __('Author'));
        $grid->column('downlink', __('Downlink'));
        $grid->column('downpassword', __('Downpassword'));
        $grid->column('content', __('Content'));
        $grid->column('hits', __('Hits'));
        $grid->column('downtimes', __('Downtimes'));
        $grid->column('manager_id', __('Manager id'));
        $grid->column('tags', __('tags'))->display(function ($tags) {
            // 如果标签为空
            if(empty($tags[0])){
                return '';
            }else{
                $res = '';
                foreach($tags as $t){
                    $res .= Tag::find($t)->title.',';
                }
                $res=rtrim($res, ',');
                return $res;
            }
        });


        // $grid->column('deleted_at', __('Deleted at'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id','desc');
        $grid->quickSearch('title','author','id');

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
        $show->field('tags', __('tags'))->as(function ($tags) {
            $res = '';
            foreach($tags as $t){
                $res .= Tag::find($t)->title.',';
            }
            $res=rtrim($res, ',');
            return $res;
        });
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
        // 获取栏目列表
        $form->select('category_id',__('所属栏目'))->options('/admin/api/categories');
        // 联动
        // $form->select('category_id',__('所属栏目'))->options('/admin/api/categories')->load('needcoin', '/admin/api/getCategoryNeedcoin');

        $form->text('title', __('标题'))->rules('required|min:3');
        $form->text('author', __('作者'));
        $form->text('downlink', __('下载链接'))->rules('required|min:10');
        $form->text('downpassword', __('提取密码'))->rules('required');
        $form->editor('content', __('内容'));
        
        $form->number('hits', __('点击次数'))->default(1);
        $form->number('downtimes', __('下载次数'))->default(1);
        $form->text('manager_id', __('管理员id'))->default(\Admin::user()->id)->readonly();
        $form->number('needcoin', __('所需积分'))->default(1);
        $form->multipleSelect('tags')->options(Tag::all()->pluck('title', 'id'));

        return $form;
    }

    // 联动获取该栏目的文章，下载需要的积分，暂时不用
    public function getCategoryNeedcoin(Request $request){
        $categoryid = $request->get('q');
        return \App\Models\Category::where('id', $categoryid)->get(['id', DB::raw('needcoin as text')]);
    }
}
