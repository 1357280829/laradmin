<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->like('title', '商品名');
            $filter->like('no', '编号');
            $filter->like('size', '码数');
            $filter->like('color', '颜色');
            $filter->in('type', '商品类型')->multipleSelect(Product::$types);
        });

        $grid->id('ID')->sortable();
        $grid->title('商品名');
        $grid->no('编号');
        $grid->stock('库存')->sortable();
        $grid->type('商品类型');
        $grid->size('码数');
        $grid->color('颜色');
        $grid->buying_price('进货价')->sortable();
        $grid->selling_price('销售价')->sortable();
        $grid->friend_price('熟人价')->sortable();
        $grid->lowest_price('最低价')->sortable();
        $grid->remark('备注');
        $grid->created_at('创建时间')->sortable();

        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
        $form->text('title', '商品名')->rules('required');
        $form->text('no', '编号')->rules('required');
        $form->text('stock', '库存')->rules('required|integer|min:0');
        $form->text('type', '类型')->rules('required');
        $form->text('size', '码数')->rules('required');
        $form->text('color', '颜色')->rules('required');
        $form->text('buying_price', '进货价')->rules('numeric|min:0.01');
        $form->text('selling_price', '销售价')->rules('numeric|min:0.01');
        $form->text('friend_price', '熟人价')->rules('numeric|min:0.01');
        $form->text('lowest_price', '最低价')->rules('numeric|min:0.01');

        // 创建一个选择图片的框
        $form->image('image', '商品图')->rules('image');

        // 创建一个富文本编辑器
        $form->quill('remark', '商品描述');

        return $form;
    }
}
