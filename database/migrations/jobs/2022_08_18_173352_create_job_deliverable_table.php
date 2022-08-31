<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDeliverableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_deliverables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deliverable_id')->index();
            $table->unsignedBigInteger('job_id')->index();

            $table->timestamps();

            $table->foreign('deliverable_id')->references('id')->on('deliverables')->onDelete('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_deliverables');
    }
}
