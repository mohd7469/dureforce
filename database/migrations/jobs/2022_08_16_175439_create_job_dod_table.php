<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_dod', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('job_id')->unsigned();
            $table->unsignedInteger('dod_id')->unsigned();
            $table->timestamps();

            $table->foreign('dod_id')
                ->references('id')
                ->on('d_o_d_s')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_dod');
    }
}
