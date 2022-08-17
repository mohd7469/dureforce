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
            $table->unsignedInteger('skill_id')->index();
            $table->unsignedInteger('skill_category_id')->index();
            $table->unsignedInteger('skill_sub_category_id')->index();
            $table->unsignedInteger('module_id')->index();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('module_id')->references('id')->on('modules')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('skill_id')->references('id')->on('skills')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('skill_category_id')->references('id')->on('skill_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('skill_sub_category_id')->references('id')->on('skill_sub_categories')->cascadeOnUpdate()->cascadeOnDelete();

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
