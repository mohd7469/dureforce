<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AtlerTableEntityAttributesEntityFieldType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_attributes', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('entity_field_id')->nullable()->after('title');  
        });

        Schema::table('entity_attributes', function(Blueprint $table){
            $table->foreign('entity_field_id')->on('entity_fields')->references('id')
                    ->cascadeOnDelete()
                    ->cascadeOnUpdate();          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entity_attributes', function (Blueprint $table) {
            //
            $table->dropColumn(['entity_field_id']);
        });
    }
}
