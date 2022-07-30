<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableExtraServiceAddDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('extra_services', function(Blueprint $table){
            $table->integer('delivery')->default(0)->nullable()->after('price');
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
        Schema::table('extra_services', function(Blueprint $table){
            $table->dropColumn([
                'delivery'
            ]); 
        });
    }
}
