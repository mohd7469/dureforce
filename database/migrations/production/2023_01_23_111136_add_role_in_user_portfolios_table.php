<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleInUserPortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_portfolios', function (Blueprint $table) {
            $table->uuid('uuid')->after('id')->index('id')->unique()->nullable();
            $table->mediumText('role')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_portfolios', function (Blueprint $table) {
            $table->dropColumn('role');
            $table->dropColumn('uuid');

        });
    }
}
