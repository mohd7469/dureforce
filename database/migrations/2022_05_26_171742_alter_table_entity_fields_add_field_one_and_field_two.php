<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEntityFieldsAddFieldOneAndFieldTwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('entity_fields', function(Blueprint $table){
            $table->string('field_one')->default("Front End")->nullable();
            $table->string('field_two')->default("Back End")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('entity_fields', function(Blueprint $table){
            $table->dropColumn([
                'field_one',
                'field_two'
            ]);
        });
    }
}
