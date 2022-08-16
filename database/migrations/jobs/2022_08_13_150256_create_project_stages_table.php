<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_stages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->unsignedInteger('module_id')->index();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('project_stages');
    }
}
