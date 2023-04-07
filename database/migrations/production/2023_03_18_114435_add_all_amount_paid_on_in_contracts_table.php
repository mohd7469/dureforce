<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllAmountPaidOnInContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->timestamp('all_amount_paid_on')->after('contract_paid_amount')->nullable();
            $table->string('contract_id')->after('id')->nullable();
            $table->boolean('is_conflict')->after('contract_paid_amount')->default(false)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn(['is_conflict','contract_id','all_amount_paid_on']);
        });
    }
}
