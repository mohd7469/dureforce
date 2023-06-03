<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverableCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliverable_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deliverable_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('module_id')->index();
            $table->foreign('deliverable_id')->references('id')->on('deliverables');
            $table->foreign('category_id')->references('id')->on('sub_categories');
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
        Schema::dropIfExists('deliverable_category');
    }
}
