<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerTechnologyLogoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_logos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->morphs('module');
            $table->unsignedBigInteger('banner_background_id')->index()->nullable();
            $table->foreign('banner_background_id')->references('id')->on('banner_backgrounds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_logos');
    }
}
