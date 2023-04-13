<?php

use App\Traits\DatabaseOperations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDayPlanningsTable extends Migration
{
    use DatabaseOperations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_plannings', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index('status_id')->nullable();
            $table->unsignedBigInteger('job_id')->index('job_id')->nullable();
            $table->unsignedBigInteger('offer_id')->index('offer_id')->nullable();
            $table->unsignedBigInteger('contract_id')->index('contract_id')->nullable();
            $table->unsignedBigInteger('client_id')->index('client_id')->nullable();
            $table->date('planning_date')->nullable();
            $table->integer('total_day_hours')->nullable();
            $this->addCommonDBFields($table);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('offer_id')->references('id')->on('module_offers')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('day_plannings');
    }
}
