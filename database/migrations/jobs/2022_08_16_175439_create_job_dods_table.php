<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobDodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_dods', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('job_id')->unsigned();
            $table->unsignedBigInteger('d_o_d_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
            $table->foreign('d_o_d_id')
                ->references('id')
                ->on('d_o_d_s')
                ->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs')
                ->onDelete('RESTRICT')->onUpdate('RESTRICT');

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
