<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_documents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->enum('is_published', [ 'Deactivated', 'Active']);
            $table->integer('module_id')->index();
            $table->string('module_type')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('task_documents');
    }
}
