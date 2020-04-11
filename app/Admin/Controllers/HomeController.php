<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function changelog(Content $content){
        return $content
        ->title('系统升级记录')
        // ->description('Description...')
        // ->row(Dashboard::title())
        ->row(function (Row $row) {
            $row->column(12, function (Column $column) {
                $column->append(view('xitong/changelog'));
            });
        });  
    }
    public function index(Content $content)
    {
        return $content
            ->title('后台管理首页')
            // ->description('Description...')
            // ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });

            })->row(function (Row $row) {

                $row->column(12, function (Column $column) {
                    $column->append(view('xitong/changelog'));
                });

                
                
            });
    }
}
