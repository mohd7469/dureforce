<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectLengthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_lengths', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->integer('start_range')->nullable();
            $table->integer('end_range')->nullable();
            $table->enum('type', ['Weeks', 'Months', 'Days','Years'])->nullable();
            $table->unsignedBigInteger('module_id')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_lengths');
    }
}
