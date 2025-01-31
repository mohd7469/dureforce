<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_modes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable()->nullable();
            $table->longText('slug')->nullable()->nullable();
            $table->integer('module_id')->index()->nullable();
            $table->string('module_type')->nullable()->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliver_modes');
    }
}
