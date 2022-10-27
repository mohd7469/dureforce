<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_credentials', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name')->nullable();
                $table->string('host')->nullable();
                $table->string('password')->nullable();
                $table->string('port')->nullable();
                $table->string('database')->nullable();
                $table->string('prefix')->nullable();
                $table->string('client')->nullable();
                $table->string('type')->nullable();
                $table->boolean('is_active')->default(true)->nullable();
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
        Schema::dropIfExists('system_credentials');
    }
}
