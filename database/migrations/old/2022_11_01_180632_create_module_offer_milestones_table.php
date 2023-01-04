<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleOfferMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_offer_milestones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('module_offer_id')->index()->nullable();
            $table->string('description')->nullable();
            $table->datetime('due_date')->nullable();
            $table->integer('deposit_amount')->nullable();
            $table->boolean('is_paid')->default(false)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('module_offer_id')->references('id')->on('module_offers')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_offer_milestones');
    }
}
