<?php

use App\Traits\DatabaseOperations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayPlanningStatusCommentsTable extends Migration
{
    use DatabaseOperations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_planning_status_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id')->index('project_id')->nullable();
            $table->unsignedBigInteger('day_planning_id')->nullable();
            $table->integer('approval_status_code')->length(10)->unsigned()->nullable();
            $table->mediumText('comment');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('day_planning_id')->references('id')->on('day_plannings')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $this->addCommonDBFields($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_planning_status_comments');
    }
}
