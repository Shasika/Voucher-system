<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyCashVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_cash_vouchers', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->string('validity_period')->nullable();
            $table->dateTime('valid_till')->nullable();
            $table->integer('buyer_id')->unsigned();
            $table->timestamps();

            $table->foreign('buyer_id')
                ->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buy_cash_vouchers', function (Blueprint $table) {
            $table->dropForeign('buy_cash_vouchers_buyer_id_foreign');
        });
        Schema::dropIfExists('buy_cash_vouchers');
    }
}
