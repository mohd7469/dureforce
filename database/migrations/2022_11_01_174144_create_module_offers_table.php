<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('proposal_id')->index('proposal_id')->nullable();
            $table->morphs('module');
            $table->integer('offer_amount')->nullable();
            $table->string('contract_title')->nullable();
            $table->mediumText('description_of_work')->nullable();
            $table->datetime('start_date')->nullable();
            $table->integer('weekly_limit')->nullable();
            $table->integer('rate_per_hour')->nullable();
            $table->enum('payment_type',['Hourly','Fixed'])->nullable();
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
        Schema::dropIfExists('module_offers');
    }
}
