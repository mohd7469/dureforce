<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_software', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('software_id')->nullable();
            $table->string('title')->nullable();
            $table->decimal('price', 28,8)->default(0);
            $table->integer('delivery')->default(0);
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
        Schema::dropIfExists('extra_software');
    }
}
