<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_steps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('software_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->decimal('start_price', 28,2)->default(0)->nullable();
            $table->integer('estimated_lead_time')->nullable();
            $table->boolean('is_manual_title')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('software_id')->references('id')->on('softwares')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_steps');
    }
}
