<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientResponseFullNameInUserTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_testimonials', function (Blueprint $table) {

                $table->string('client_response_full_name')->after('client_name')->nullable();
                $table->string('client_response_role')->after('client_name')->nullable();
                $table->string('client_response_company')->after('client_name')->nullable();
                $table->string('client_response_linkedin_profile_url')->after('client_name')->nullable();

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
            $table->dropColumn(['client_response_full_name','client_response_role','client_response_company','client_response_linkedin_profile_url']);
        });
    }
}
