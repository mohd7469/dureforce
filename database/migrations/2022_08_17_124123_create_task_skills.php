<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_skills', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('skill_id')->index();
            $table->unsignedInteger('skill_category_id')->index();
            $table->unsignedInteger('skill_sub_category_id')->index();
            $table->integer('module_id')->index();
            $table->string('module_type')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('skill_id')->references('id')->on('skills')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('skill_category_id')->references('id')->on('skill_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('skill_category_id')->references('id')->on('jobs')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_skills');
    }
}
