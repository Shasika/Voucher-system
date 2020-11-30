<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_vouchers', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->string('validity_period')->nullable();
            $table->dateTime('valid_till')->nullable();
            $table->integer('created_role')->unsigned();
            $table->integer('created_by')->unsigned();
            $table->integer('is_purchased')->default(0);

            $table->timestamps();

            $table->foreign('created_role')
                ->references('id')->on('user_roles');
            $table->foreign('created_by')
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
        Schema::table('cash_vouchers', function (Blueprint $table) {
            $table->dropForeign('cash_vouchers_created_role_foreign');
            $table->dropForeign('cash_vouchers_created_by_foreign');
        });
        Schema::dropIfExists('cash_vouchers');
    }
}
