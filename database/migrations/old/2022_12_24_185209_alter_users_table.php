<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('users', function (Blueprint $table) {
            $table->after('sms_verified_at', function ($table) {
                $table->datetime('last_login_at')->nullable();
                $table->datetime('last_activity_at')->nullable();
                $table->boolean('is_session_active')->default(false);

            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_activity_at');
            $table->dropColumn('is_session_active');
        });
    }
}
