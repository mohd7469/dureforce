<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class CreateContractFeedbackTable extends Migration
{
    use DatabaseOperations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('contract_feedback', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('role_id')->nullable();
//            $table->unsignedBigInteger('reason_end_contract_id')->nullable();
//            $table->unsignedBigInteger('not_recomended_reason_id')->nullable();
//            $table->unsignedBigInteger('language_level_id')->nullable();
            $table->unsignedBigInteger('feedback_for_id')->index()->nullable();
            $table->unsignedBigInteger('contract_id')->index('contract_id')->nullable();

//            $table->float('recomended_score')->nullable();
//            $table->float('skills_score')->nullable();
//            $table->float('quality_of_work_score')->nullable();
//            $table->float('availability_score')->nullable();
//            $table->float('adherence_of_schedule_score')->nullable();
//            $table->float('communication_score')->nullable();
//            $table->float('cooperation_score')->nullable();
            $table->float('total_score')->nullable();

//            $table->string('about')->nullable();
            $table->string('feedback')->nullable();
            
            $table->foreign('role_id')->references('id')->on('roles');
//            $table->foreign('reason_end_contract_id')->references('id')->on('reason_end_contracts');
//            $table->foreign('not_recomended_reason_id')->references('id')->on('not_recomended_reasons');
//            $table->foreign('language_level_id')->references('id')->on('language_levels');
            $table->foreign('feedback_for_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('RESTRICT')->onUpdate('RESTRICT');

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
        Schema::dropIfExists('contract_feedback');
    }
}
