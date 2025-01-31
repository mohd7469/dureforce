<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleChatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_chat_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sender_id')->index('sender_id')->nullable();
            $table->unsignedBigInteger('send_to_id')->index('send_to_id')->nullable();
            $table->uuid('proposal_uuid')->nullable();
            $table->morphs('module');//job,service,software
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('send_to_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');

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
        Schema::dropIfExists('module_chat_users');
    }
}
