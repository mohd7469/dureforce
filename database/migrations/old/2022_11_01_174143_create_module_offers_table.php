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
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('proposal_id')->index('proposal_id')->nullable();
            $table->unsignedBigInteger('offer_send_to_id')->index('offer_send_to_id')->nullable();
            $table->unsignedBigInteger('offer_send_by_id')->index('offer_send_by_id')->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->morphs('module');
            $table->integer('offer_amount')->nullable();
            $table->string('contract_title')->nullable();
            $table->mediumText('description_of_work')->nullable();
            $table->datetime('start_date')->nullable();
            $table->integer('weekly_limit')->nullable();
            $table->integer('rate_per_hour')->nullable();
            $table->enum('payment_type',['Hourly','Fixed'])->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('offer_send_to_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('offer_send_by_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('RESTRICT')->onUpdate('RESTRICT');

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
