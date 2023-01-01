<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->morphs('module');

            $table->unsignedBigInteger('banner_background_id')->index()->nullable();
            $table->enum('banner_type',['Static','Dynamic','Video'])->nullable();

            $table->string('name')->index()->nullable();
            $table->string('uploaded_name')->index()->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();

            $table->string('banner_heading')->nullable();
            $table->string('banner_introduction')->nullable();

            $table->string('video_url')->nullable();
            $table->timestamps();
            
            $table->foreign('banner_background_id')->references('id')->on('banner_backgrounds')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_banners');
    }
}
