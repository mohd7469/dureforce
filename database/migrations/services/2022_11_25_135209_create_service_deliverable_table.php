<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDeliverableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_deliverables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deliverable_id')->index();
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('deliverable_id')->references('id')->on('deliverables')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_deliverables');
    }
}
