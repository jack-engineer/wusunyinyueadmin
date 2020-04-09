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
        $grid->column('category_id', __('所属栏目'))->display(function($category_id){
            return \App\Models\Category::find($category_id)->title;
        });

        $grid->column('title', __('标题'))->editable();
        $grid->column('author', __('作者'));
        $grid->column('downlink', __('下载链接'));
        $grid->column('downpassword', __('提取码'));
        $grid->column('content', __('Content'));
        $grid->column('hits', __('点击数'));
        $grid->column('downtimes', __('下载次数'));
        // $grid->column('manager_id', __('Manager id'));
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
        $grid->column('userrole_id','所需用户角色')->display(function($userrole_id){
            $str = \App\Models\Userrole::find($userrole_id)->title;
            return $str;
        });
        $grid->column('needcoin','所需积分')->editable();


        // $grid->column('deleted_at', __('Deleted at'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        $grid->model()->orderBy('id','desc');
        $grid->quickSearch('title','author','id');

        $grid->filter(function($filter){

            // 去掉默认的 id 过滤器
            $filter->disableIdFilter();
    
            // 添加新的字段过滤器（通过栏目过滤）
            $filter->like('category_id', '栏目id');
        });

        $categorys = \App\Models\Category::all()->toArray();
        $category_array=[];
        foreach($categorys as $c){
            $category_array[$c['id']]=$c['title'];
        }
        // dd($category_array);
        $grid->selector(function (Grid\Tools\Selector $selector) {
            $selector->select('category_id', '栏目',[
            4 => "抖音流行",
            5 => "欧美流行",
            6 => "明星专辑",
            7 => "车载音乐",
            8 => "DSD音乐",
            9 => "DJ舞曲",
            10 => "ACG动漫",
            11 => "古典纯乐",
            12 => "日韩合辑",
            13 => "稀有音乐",
          ]);
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('category_id', __('Category id'))->as(function($category_id){
            return \App\Models\Category::find($category_id)->title;
        });
        $show->field('title', __('标题'));
        $show->field('author', __('作者'));
        $show->field('downlink', __('下载拦截'));
        $show->field('downpassword', __('提取码'));
        $show->field('content', __('内容'));
        $show->field('hits', __('点击数'));
        $show->field('downtimes', __('下载次数'));
        $show->field('manager_id', __('管理员id'));
        $show->field('tags', __('tags'))->as(function ($tags) {
            if(empty($tags[0])){
                return;
            }
            $res = '';
            foreach($tags as $t){
                $res .= Tag::find($t)->title.',';
            }
            $res=rtrim($res, ',');
            return $res;
        });
        $show->field('userrole_id', __('文章的用户角色'))->as(function($userrole_id){
            return \App\Models\Userrole::find($userrole_id)->title ?? '青铜会员';;
        });
        $show->field('needcoin',__('下载所需积分'));
        // $show->field('deleted_at', __('Deleted at'));
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
        // 获取用户角色列表
        $form->select('userrole_id',__('文章用户角色'))->options('/admin/api/userroles');
        return $form;
    }

    // 联动获取该栏目的文章，下载需要的积分，暂时不用
    public function getCategoryNeedcoin(Request $request){
        $categoryid = $request->get('q');
        return \App\Models\Category::where('id', $categoryid)->get(['id', DB::raw('needcoin as text')]);
    }
}
