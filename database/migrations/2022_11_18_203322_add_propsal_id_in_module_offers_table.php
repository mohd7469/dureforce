<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPropsalIdInModuleOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_offers', function (Blueprint $table) {
            $table->unsignedBigInteger('proposal_id')->index('proposal_id')->nullable()->after('id');
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            
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
            $table->dropForeign('proposal_id');
            $table->dropColumn('proposal_id');
        });
    }
}
