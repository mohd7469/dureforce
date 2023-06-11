<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReasonEndContractId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contract_feedback', function (Blueprint $table) {

            $table->unsignedBigInteger('reason_end_contract_id')->nullable()->after('contract_id');;


            $table->foreign('reason_end_contract_id')->references('id')->on('feedback_reasons');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contract_feedback', function (Blueprint $table) {
            //
        });
    }
}
