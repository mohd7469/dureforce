<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class AddTimestampsInWorldPackage extends Migration
{
    
    use DatabaseOperations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('world_languages', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_countries', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_countries_locale', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_cities', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_cities_locale', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_continents', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_continents_locale', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_divisions', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
        Schema::table('world_divisions_locale', function (Blueprint $table) {
            $this->addCommonDBFields($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('world_package', function (Blueprint $table) {
            //
        });
    }
}
