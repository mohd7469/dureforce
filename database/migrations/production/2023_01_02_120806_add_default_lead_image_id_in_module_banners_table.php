<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultLeadImageIdInModuleBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_banners', function (Blueprint $table) {
            $table->unsignedBigInteger('default_lead_image_id')->index('default_lead_image_id')->nullable()->default(null)->after('banner_background_id');
            $table->foreign('default_lead_image_id')->references('id')->on('banner_backgrounds')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            
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
            $table->dropForeign(['default_lead_image_id']);
            $table->dropColumn('default_lead_image_id');
        });
    }
}
