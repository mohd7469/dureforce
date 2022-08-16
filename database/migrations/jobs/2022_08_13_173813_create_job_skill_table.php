<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_skill', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('job_id')->unsigned();
            $table->unsignedInteger('skill_id')->unsigned();

            $table->foreign('skill_id')
                ->references('id')
                ->on('skills')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_skill');
    }
}
