<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement();
            $table->string('image')->nullable();
            $table->float('price')->nullable();
            $table->string('terms_conditions')->nullable();
            $table->string('validity_period')->nullable();
            $table->dateTime('valid_till')->nullable();
            $table->integer('created_role')->unsigned();
            $table->integer('is_approved');
            $table->integer('is_purchased')->default(0);

            $table->timestamps();

            $table->foreign('created_role')
                ->references('id')->on('user_roles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropForeign('vouchers_created_role_foreign');
        });
        Schema::dropIfExists('vouchers');
    }
}
