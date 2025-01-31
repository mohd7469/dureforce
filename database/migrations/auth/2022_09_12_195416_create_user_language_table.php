<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedInteger('language_id')->index()->nullable();
            $table->unsignedBigInteger('language_level_id')->index()->nullable();
           
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('world_languages')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('language_level_id')->references('id')->on('language_levels')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_languages');
    }
}
