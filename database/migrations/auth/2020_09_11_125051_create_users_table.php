<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class CreateUsersTable extends Migration
{
    use DatabaseOperations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('country_id')->index()->nullable();
            $table->unsignedBigInteger('service_fee_id')->index()->nullable();
            $table->unsignedBigInteger('last_role_activity')->index()->nullable();

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->boolean('email_verified')->default(false)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('sms_verified')->default(false)->nullable();
            $table->timestamp('sms_verified_at')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->decimal('rate_per_hour', 28,2)->default(0)->nullable();

            $this->addCommonDBFields($table);

            $table->foreign('country_id')->references('id')->on('world_countries')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('service_fee_id')->references('id')->on('service_fees')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('last_role_activity')->references('id')->on('roles')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
