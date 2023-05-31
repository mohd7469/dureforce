<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLeadImageTypeInModuleBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_banners', function (Blueprint $table) {
            $table->enum('lead_image_type',['Custom','Default'])->nullable()->after('banner_type')->default('Custom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_banners', function (Blueprint $table) {
            $table->dropColumn('lead_image_type');
        });
    }
}
