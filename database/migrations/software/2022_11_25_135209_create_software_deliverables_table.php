<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareDeliverablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_deliverables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('deliverable_id')->index();
            $table->unsignedBigInteger('software_id')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('deliverable_id')->references('id')->on('deliverables')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('software_id')->references('id')->on('softwares')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_deliverables');
    }
}
