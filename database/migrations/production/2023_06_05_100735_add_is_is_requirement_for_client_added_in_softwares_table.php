<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsIsRequirementForClientAddedInSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('softwares', function (Blueprint $table) {
            $table->boolean('is_requirement_for_client_added')->nullable()->after('requirement_for_client');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('softwares', function (Blueprint $table) {
            $table->dropColumn('is_requirement_for_client_added');
            
        });
    }
}
