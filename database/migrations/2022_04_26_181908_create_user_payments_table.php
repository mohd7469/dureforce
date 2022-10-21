<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->string('card_number')->nullable();
            $table->date('expiration_date');
            $table->integer('cvv_code')->nullable();
            $table->string('name_on_card')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('street_address')->nullable();
            $table->boolean('status')->default(0)->comment('1 for active 0 for in active');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        Schema::table('user_payments', function(Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->cascadeOnDelete()
                  ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payments');
    }
}
