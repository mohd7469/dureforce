<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedHoursInContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            
            $table->float('approved_hours',2)->nullable()->after('contract_paid_amount');
            $table->float('total_worked_hours',2)->nullable()->after('contract_paid_amount');

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
            $table->dropColumn('total_worked_hours');
            $table->dropColumn('approved_hours');

        });
    }
}
