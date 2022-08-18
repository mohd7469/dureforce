<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skill_id')->index();
            $table->unsignedBigInteger('skill_category_id')->index();
            $table->unsignedBigInteger('skill_sub_category_id')->index();
            $table->unsignedBigInteger('module_id')->index();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->foreign('skill_category_id')->references('id')->on('skill_categories')->onDelete('cascade');
            $table->foreign('skill_sub_category_id')->references('id')->on('skill_sub_categories')->onDelete('cascade');

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
