<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class ModuleProposalsTable extends Migration
{
    use DatabaseOperations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_proposals', function (Blueprint $table) {
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
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
            $this->addCommonDBFields($table);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('delivery_mode_id')->references('id')->on('delivery_modes')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('service_fees_id')->references('id')->on('service_fees')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_proposals');
    }
}
