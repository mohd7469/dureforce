<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRequestPaymewntInDayPlanningTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_planning_tasks', function (Blueprint $table) {
            $table->boolean('is_payment_requested', false)->after('time_in_minutes');
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
            $table->dropColumn('is_payment_requested');
        });
    }
}
