<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index('uuid');
            $table->unsignedInteger('user_id')->index();
//            $table->unsignedInteger('location_id');// no table for this pkg will be used
            $table->unsignedInteger('rank_id'); //it will be used as experience level
            $table->unsignedInteger('project_stage_id'); //table created
            $table->unsignedInteger('status_id'); //table created
            $table->unsignedInteger('job_type_id'); //table created
            $table->unsignedInteger('budget_type_id'); // table created
            $table->string('title')->nullable();
            $table->string('requirements')->nullable(); // will create a table for documents attached
            $table->longText('description')->nullable();
            $table->decimal('fixed_amount', 28,8)->default(0)->nullable();
            $table->decimal('hourly_start_range', 28,8)->default(0)->nullable();
            $table->decimal('hourly_end_range', 28,8)->default(0)->nullable();
            $table->integer('offered_amount')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->longText('job_link')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image', 40)->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('rank_id')->references('id')->on('ranks')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('project_stage_id')->references('id')->on('project_stages')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('status_id')->references('id')->on('statuses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('job_type_id')->references('id')->on('job_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('budget_type_id')->references('id')->on('budget_types')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
