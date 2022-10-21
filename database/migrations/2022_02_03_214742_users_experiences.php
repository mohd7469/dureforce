<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersExperiences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('company', 250);
            $table->longText('description');
            $table->boolean('isCurrent')->default(false);
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->unsignedBigInteger('user_id');
        });

        Schema::table('user_experiences', function (Blueprint $table) {
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
        Schema::dropIfExists('user_experiences');
    }
}
