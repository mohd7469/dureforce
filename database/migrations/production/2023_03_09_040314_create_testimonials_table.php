<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->nullable();
            $table->unsignedBigInteger('testimonial_by')->index()->nullable();
            $table->unsignedBigInteger('testimonial_for')->index()->nullable();
            $table->string('description')->nullable();
            $table->integer('quality_rating')->nullable();
            $table->integer('communication_rating')->nullable();
            $table->integer('expertise_rating')->nullable();
            $table->integer('professionalism_rating')->nullable();
            $table->foreign('testimonial_by')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('testimonial_for')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');

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
        Schema::dropIfExists('testimonials');
    }
}
