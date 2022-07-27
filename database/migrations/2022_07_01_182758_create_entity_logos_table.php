<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_logos', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['SERVICE', 'JOB', 'SOFTWARE']);
            $table->unsignedBigInteger('type_id')->nullable();
            $table->unsignedBigInteger('logo_id')->nullable();
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
        Schema::dropIfExists('entity_logos');
    }
}
