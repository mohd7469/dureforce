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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->string('card_number')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('cvv_code')->nullable();
            $table->string('name_on_card')->nullable();
            $table->longText('address')->nullable();
            $table->boolean('is_primary')->default(true)->nullable();
            $table->boolean('is_active')->default(true)->nullable();

            $table->softDeletes();
            $table->timestamps();


            $table->foreign('country_id')->references('id')->on('world_countries')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('world_cities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
