<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPaymentMethodSelectedToModuleOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_offers', function (Blueprint $table) {
            $table->boolean('is_payment_method_selected')->default(false)->nullable()->after('is_active');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_offers', function (Blueprint $table) {
            //
        });
    }
}
