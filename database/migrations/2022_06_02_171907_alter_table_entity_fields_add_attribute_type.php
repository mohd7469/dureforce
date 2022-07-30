<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEntityFieldsAddAttributeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entity_fields', function (Blueprint $table) {
            //
            $table->boolean('attribute_type')->default(true)->comment('1 for multi select 0 for select');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entity_fields', function (Blueprint $table) {
            //
            $table->dropColumn([
                'attribute_type'
            ]);
        });
    }
}
