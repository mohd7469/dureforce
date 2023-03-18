<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMilestoneAmountPaidOnInModuleOfferMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_offer_milestones', function (Blueprint $table) {
            $table->timestamp('milestone_amount_paid_on')->after('is_paid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_offer_milestones', function (Blueprint $table) {
            $table->dropColumn('milestone_amount_paid_on');
        });
    }
}
