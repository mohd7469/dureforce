<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_attributes', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->unsignedBigInteger('skills_id')->index()->nullable();

            $table->softDeletes();
            $table->timestamps();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('skills_id')->references('id')->on('skills')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_attributes');
    }
}
