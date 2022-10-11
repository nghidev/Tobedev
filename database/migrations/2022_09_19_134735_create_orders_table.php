<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
            ->onDelete('cascade');

            $table->string('code');
            $table->integer('total');
            $table->string('consignee_name')->nullable();
            $table->string('consignee_tel')->nullable();
            $table->string('consignee_address')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 đơn hàng mới, 1 đã duyệt, 2 đang giao, 3 hoàn thành, 4 hủy đơn');
            $table->tinyInteger('payment_method')->default(0)->comment('0 giao hàng thu tiền hộ - tiền mặt, 2 chuyển khoản ngân hàng');
            $table->text('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
   
}
