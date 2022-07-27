<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('software_id');
            $table->text('entity_fields')->nullable();
            $table->string('client_requirements')->nullable();
            $table->integer('max_no_projects')->nullable()->default(0);
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
        Schema::dropIfExists('software_details');
    }
}
