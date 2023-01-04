<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_attachments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->index()->nullable();
            $table->string('uploaded_name')->index()->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->enum('is_published', [ 'Deactivated', 'Active']);
            $table->unsignedBigInteger('proposal_id')->index()->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposal_attachments');
    }
}
