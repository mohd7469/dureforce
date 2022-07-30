<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->boolean('programming_language')->default(0)->comment('boolean to check if programming_language is selected or not');
            $table->boolean('coding_competence')->default(0)->comment('boolean to check if coding_competence is selected or not');
            $table->boolean('development_type')->default(0)->comment('boolean to check if development_type is selected or not');
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
        Schema::dropIfExists('service_details');
    }
}
