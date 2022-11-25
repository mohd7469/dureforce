<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skills_id')->index()->nullable();
            $table->unsignedBigInteger('service_id')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('skills_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_skills');
    }
}
