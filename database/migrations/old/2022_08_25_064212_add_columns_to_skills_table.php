<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skills', function (Blueprint $table) {
            $table->string('skill_type')->nullable();
            $table->unsignedBigInteger('module_id')->index()->nullable();
            $table->unsignedBigInteger('skill_category_id')->index()->nullable();

            $table->softDeletes();
            $table->foreign('skill_category_id')->references('id')->on('skill_categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skills', function (Blueprint $table) {
            //
        });
    }
}
