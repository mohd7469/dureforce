<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class CreateJobsTable extends Migration
{
    use DatabaseOperations;

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
            $table->unsignedBigInteger('country_id')->nullable();//
            $table->unsignedBigInteger('rank_id')->nullable(); //it will be used as experience level
            $table->unsignedBigInteger('project_stage_id')->nullable(); //table created
            $table->unsignedBigInteger('status_id')->nullable(); //table created
            $table->unsignedBigInteger('job_type_id')->nullable(); //table created
            $table->unsignedBigInteger('budget_type_id')->nullable(); // table created
            $table->unsignedBigInteger('project_length_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('fixed_amount', 28,2)->default(0)->nullable();
            $table->decimal('hourly_start_range', 28,2)->default(0)->nullable();
            $table->decimal('hourly_end_range', 28,2)->default(0)->nullable();
            $table->integer('offered_amount')->nullable();

            $table->longText('job_link')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->integer('views')->default(0)->nullable();
            $table->timestamp('last_viewed')->nullable();
            $this->addCommonDBFields($table);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('rank_id')->references('id')->on('ranks')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('project_stage_id')->references('id')->on('project_stages')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('budget_type_id')->references('id')->on('budget_types')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('project_length_id')->references('id')->on('project_lengths')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('country_id')->references('id')->on('world_countries')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
