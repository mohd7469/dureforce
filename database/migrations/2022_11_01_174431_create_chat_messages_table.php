<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('sender_id')->index('sender_id')->nullable();
            $table->unsignedBigInteger('send_to_id')->index('send_to_id')->nullable();
            $table->morphs('module');//job,service,software
            $table->unsignedBigInteger('offer_id')->index('offer_id')->nullable();
            $table->mediumText('message')->nullable();
            $table->enum('role',['client','freelancer','admin'])->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('send_to_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('offer_id')->references('id')->on('module_offers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
