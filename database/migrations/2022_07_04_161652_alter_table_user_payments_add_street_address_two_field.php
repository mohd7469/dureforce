<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUserPaymentsAddStreetAddressTwoField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('user_payments', function(Blueprint $table) {
            $table->string('street_address_two')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('user_payments', function(Blueprint $table) {
            $table->dropColumn([
                'street_address_two'
            ]);
        });
    }
}
