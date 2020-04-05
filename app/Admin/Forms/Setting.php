<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class Setting extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '网站设置';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        // 从$request对象中获取数据来处理...

        // 加入一个成功提示
        admin_success('数据处理成功.');

        // 或者一个错误提示
        admin_success('数据处理成功失败.');

        // 处理完成之后回到原来的表单页面，或者通过返回`redirect()`方法跳转到其它页面
        // return back();

        // $result = 计算获得数据...
        $result = $request->name.$request->email;
        return back()->with(['result' => $result]);
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->text('name')->rules('required');
        $this->email('email')->rules('email');
        $this->datetime('created_at');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name'       => 'John Doe',
            'email'      => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];
    }
}
