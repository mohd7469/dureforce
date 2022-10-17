<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('delivery_mode_id')->index()->nullable();
            $table->unsignedBigInteger('service_fees_id')->index()->nullable();
            $table->integer('module_id')->index()->nullable();
            $table->string('module_type')->nullable()->nullable();
            $table->decimal('hourly_bid_rate', 28, 2)->nullable();
            $table->enum('bid_type', ['Milestone', 'Project'])->nullable();
            $table->decimal('fixed_bid_amount', 28, 2)->nullable();
            $table->decimal('amount_receive', 28, 2)->nullable();
            $table->integer('start_hour_limit')->nullable();
            $table->integer('end_hour_limit')->nullable();
            $table->longText('cover_letter')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->boolean('is_shortlisted')->default(false)->nullable();
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('delivery_mode_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->foreign('service_fees_id')->references('id')->on('service_fees')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
