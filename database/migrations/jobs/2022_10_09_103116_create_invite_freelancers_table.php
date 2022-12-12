<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInviteFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_freelancers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('job_id')->index()->nullable();
            $table->longText('message')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invite_freelancers');
    }
}
