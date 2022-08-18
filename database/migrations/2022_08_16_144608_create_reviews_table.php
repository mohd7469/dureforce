<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('reviewable_id')->index();
            $table->string('reviewable_type')->index();
            $table->unsignedBigInteger('job_id')->index();
            $table->string('client_feedback')->nullable();
            $table->string('freelancer_response')->nullable();
            $table->string('freelancer_feedback')->nullable();
            $table->string('client_response')->nullable();
            $table->integer('client_rating')->nullable();
            $table->integer('freelancer_rating')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
