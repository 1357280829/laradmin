<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('商品名称');
            $table->string('no')->comment('商品编号');
            $table->unsignedInteger('stock')->comment('库存');
            $table->string('type')->comment('商品类型');
            $table->string('size')->comment('码数');
            $table->string('color')->comment('颜色');
            $table->decimal('buying_price', 10, 2)->default(0)->comment('进货价');
            $table->decimal('selling_price', 10, 2)->default(0)->comment('销售价');
            $table->decimal('friend_price', 10, 2)->default(0)->comment('熟人价');
            $table->decimal('lowest_price', 10, 2)->default(0)->comment('最低价');
            $table->string('image')->nullable()->comment('商品图');
            $table->text('remark')->nullable()->comment('商品备注');
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
        Schema::dropIfExists('products');
    }
}
