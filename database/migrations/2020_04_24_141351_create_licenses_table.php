<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('营业执照名称');
            $table->string('tax_no')->comment('纳税号');
            $table->string('legal_person')->comment('法人');
            $table->string('identity')->comment('身份证号');
            $table->string('phone')->comment('手机号');
            $table->string('tax_declaration_account')->comment('纳税申报账号');
            $table->string('tax_declaration_password')->comment('纳税申报密码');
            $table->string('personal_income_tax_account')->comment('个人所得税账号');
            $table->string('personal_income_tax_password')->comment('个人所得税密码');
            $table->timestamp('contract_period')->comment('合同期限');
            $table->text('monthly_report')->nullable()->comment('月报');
            $table->text('quarterly_report')->nullable()->comment('季报');
            $table->string('salesman')->comment('业务员');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}
