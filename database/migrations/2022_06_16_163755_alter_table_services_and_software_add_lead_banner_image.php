<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableServicesAndSoftwareAddLeadBannerImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('services', function(Blueprint $table){
            $table->string('lead_image')->after('banner_heading')->nullable();
        });

        Schema::table('software', function(Blueprint $table){
            $table->string('lead_image')->after('image')->nullable();
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
        Schema::table('services', function(Blueprint $table){
            $table->dropColumn([
                'lead_image'
            ]);
        });

        Schema::table('software', function(Blueprint $table){
            $table->dropColumn([
                'lead_image'
            ]);
        });
    }
}
