<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableServicesAndSoftwareAddTechnologyLogos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->string('technology_logos')->nullable()->after('lead_image');
        });

        Schema::table('software', function (Blueprint $table) {
            //
            $table->string('technology_logos')->nullable()->after('lead_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            //
            $table->dropColumn([
                'technology_logos'
            ]);
        });

        Schema::table('software', function (Blueprint $table) {
            //
            $table->dropColumn([
                'technology_logos'
            ]);
        });
    }
}
