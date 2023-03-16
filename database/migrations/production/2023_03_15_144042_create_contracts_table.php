<?php

use App\Traits\DatabaseOperations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    use DatabaseOperations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('module_offer_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->integer('contract_total_amount')->nullable();
            $table->integer('contract_paid_amount')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->foreign('module_offer_id')->references('id')->on('module_offers')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $this->addCommonDBFields($table);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
