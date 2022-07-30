<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEntityFieldsAddFieldType extends Migration
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
            $table->boolean('field_type')->default(0)->comment('0 for select 1 for checkbox');
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
                'field_type'
            ]);
        });
    }
}
