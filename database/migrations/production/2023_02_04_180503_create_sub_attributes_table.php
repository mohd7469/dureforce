<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skill_category_id')->index()->nullable();
            $table->string('title')->nullable();
            $table->unsignedBigInteger('module_id')->index();
            $table->boolean('is_active')->default(true)->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('module_id')
                ->references('id')
                ->on('modules');

            $table->foreign('skill_category_id')->references('id')->on('skill_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_attributes');
    }
}
