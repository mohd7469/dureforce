<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_module', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('software_id')->nullable();
            $table->string('module_title')->nullable();
            $table->text('module_description')->nullable();
            $table->integer('price')->nullable();
            $table->integer('estimated_lead_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_module');
    }
}
