<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name', 250);
            $table->string('degree', 250);
            $table->integer('degree_id')->nullable()->comment("just if load predefine data in drop down");
            $table->longText('description');
            $table->string('field', 250);
            $table->integer('field_id')->nullable()->comment("just if load predefine data in drop down");
            $table->boolean('isCurrent')->default(false);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('user_education', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_education');
    }
}
