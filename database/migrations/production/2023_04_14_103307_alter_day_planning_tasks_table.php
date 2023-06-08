<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDayPlanningTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_planning_tasks', function (Blueprint $table) {
            $table->time('start_time')->change();
            $table->time('end_time')->change();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('day_planning_tasks', function (Blueprint $table) {
            $table->integer('end_time')->change();
            $table->integer('start_time')->change();
        });
    }
}
