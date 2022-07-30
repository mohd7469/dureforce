<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLanguagesAddLevelId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('user_languages', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id')->nullable();
        });


        Schema::table('user_languages', function (Blueprint $table) {
            $table->foreign('level_id')
                ->references('id')
                ->on('language_levels');
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
        Schema::table('user_languages', function (Blueprint $table) {
            $table->dropColumn([
                'level_id'
            ]);
        });
    }
}
