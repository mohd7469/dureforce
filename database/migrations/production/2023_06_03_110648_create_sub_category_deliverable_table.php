<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryDeliverableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_category_deliverable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deliverable_id')->index();
            $table->unsignedBigInteger('sub_category_id')->index();
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('deliverable_id')->references('id')->on('deliverables');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_category_deliverable');
    }
}
