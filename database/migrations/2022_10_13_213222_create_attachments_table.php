<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index()->nullable();
            $table->string('uploaded_name')->index()->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->enum('is_published', [ 'Deactivated', 'Active']);
            $table->integer('model_id')->index();
            $table->string('model_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
