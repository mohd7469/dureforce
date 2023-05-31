<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_portfolio_id')->index()->nullable();
            $table->unsignedBigInteger('skill_id')->index()->nullable();
            $table->foreign('user_portfolio_id')->references('id')->on('user_portfolios')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('portfolio_skills');
    }
}
