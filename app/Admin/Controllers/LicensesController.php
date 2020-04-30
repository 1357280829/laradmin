<?php

namespace App\Admin\Controllers;

use App\Models\License;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LicensesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '企业营业执照';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new License());

        $grid->id('ID')->sortable();
        $grid->title('营业执照名称');
        $grid->tax_no('纳税号');
        $grid->legal_person('法人');
        $grid->identity('身份证号');
        $grid->phone('手机号');
//        $grid->tax_declaration_account('纳税申报账号');
//        $grid->tax_declaration_password('纳税申报密码');
//        $grid->personal_income_tax_account('个人所得税账号');
//        $grid->personal_income_tax_password('个人所得税密码');
        $grid->contract_period('合同期限');
//        $grid->monthly_report('月报');
//        $grid->quarterly_report('季报');
        $grid->salesman('业务员');
        $grid->created_at('创建时间');

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
        $form = new Form(new License());

        $form->text('title', '营业执照名称')->rules('required');
        $form->text('tax_no', '纳税号')->rules('required');
        $form->text('legal_person', '法人')->rules('required');
        $form->text('identity', '身份证号')->rules('required');
        $form->text('phone', '手机号')->rules('required');
        $form->text('tax_declaration_account', '纳税申报账号')->rules('required');
        $form->text('tax_declaration_password', '纳税申报密码')->rules('required');
        $form->text('personal_income_tax_account', '个人所得税账号')->rules('required');
        $form->text('personal_income_tax_password', '个人所得税密码')->rules('required');
        $form->datetime('contract_period', '合同期限')->rules('required');
        $form->quill('monthly_report', '月报');
        $form->quill('quarterly_report', '季报');
        $form->text('salesman', '业务员')->rules('required');

        return $form;
    }
}
