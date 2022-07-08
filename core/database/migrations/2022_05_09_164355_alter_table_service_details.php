<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableServiceDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_details', function (Blueprint $table) {
            //
            $table->boolean('database')->default(0)->comment('boolean to check if database is selected or not');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_details', function (Blueprint $table) {
            //
            $table->dropColumn([
                'database'
            ]);
        });
    }
}
