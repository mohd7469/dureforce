<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareProvidingStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_providing_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('software_id')->nullable(); //table created
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
        Schema::dropIfExists('software_providing_steps');
    }
}
