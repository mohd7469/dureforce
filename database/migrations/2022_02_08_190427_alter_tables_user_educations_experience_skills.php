<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesUserEducationsExperienceSkills extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('user_education', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('user_skills', function(Blueprint $table){
            $table->timestamps();
        });

        Schema::table('user_experiences', function(Blueprint $table){
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
        //
        Schema::table('user_education', function(Blueprint $table){
            $table->dropColumn([
                'created_at',
                'updated_at'
            ]);
        });
        Schema::table('user_skills', function(Blueprint $table){
            $table->dropColumn([
                'created_at',
                'updated_at'
            ]);
        });
        Schema::table('user_experiences', function(Blueprint $table){
            $table->dropColumn([
                'created_at',
                'updated_at'
            ]);
        });
    }
}
