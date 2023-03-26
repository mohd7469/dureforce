<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjectTypeInUserTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_testimonials', function (Blueprint $table) {
            $table->string('project_type')->nullable()->after('client_linkedin_url');
            $table->string('message_to_client')->nullable()->after('client_linkedin_url');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_testimonials', function (Blueprint $table) {
            $table->dropColumn(['message_to_client','project_type']);
        });
    }
}
