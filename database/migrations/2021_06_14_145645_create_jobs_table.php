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
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
//            $table->unsignedInteger('location_id');// no table for this pkg will be used
            $table->unsignedBigInteger('rank_id')->nullable(); //it will be used as experience level
            $table->unsignedBigInteger('project_stage_id')->nullable(); //table created
            $table->unsignedBigInteger('status_id')->nullable(); //table created
            $table->unsignedBigInteger('job_type_id')->nullable(); //table created
            $table->unsignedBigInteger('budget_type_id')->nullable(); // table created
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('fixed_amount', 28,8)->default(0)->nullable();
            $table->decimal('hourly_start_range', 28,8)->default(0)->nullable();
            $table->decimal('hourly_end_range', 28,8)->default(0)->nullable();
            $table->integer('offered_amount')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->longText('job_link')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('cascade');
            $table->foreign('project_stage_id')->references('id')->on('project_stages')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->foreign('budget_type_id')->references('id')->on('budget_types')->onDelete('cascade');
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
