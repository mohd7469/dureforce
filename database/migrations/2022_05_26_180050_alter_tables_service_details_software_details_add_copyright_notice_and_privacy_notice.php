<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesServiceDetailsSoftwareDetailsAddCopyrightNoticeAndPrivacyNotice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('software_details', function(Blueprint $table){
            $table->boolean('copyright_notice')->default(0);
            $table->boolean('privacy_notice')->default(0);
        });

        Schema::table('service_details', function(Blueprint $table){
            $table->boolean('copyright_notice')->default(0);
            $table->boolean('privacy_notice')->default(0);
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
        Schema::table('service_details', function(Blueprint $table){
            $table->dropColumn([
                'copyright_notice',
                'privacy_notice'
            ]);
        });

        Schema::table('software_details', function(Blueprint $table){
            $table->dropColumn([
                'copyright_notice',
                'privacy_notice'
            ]);
        });
    }
}
