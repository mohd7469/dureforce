<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_backgrounds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('document_type',['Background','Technology Logo','Logo'])->nullable();
            $table->string('subject')->index()->nullable();
            $table->string('name')->index()->nullable();
            $table->string('uploaded_name')->index()->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_backgrounds');
    }
}
