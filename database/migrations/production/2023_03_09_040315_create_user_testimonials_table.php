<?php

use App\Traits\DatabaseOperations;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTestimonialsTable extends Migration
{
    use DatabaseOperations;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_testimonials', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->string('description')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_linkedin_url')->nullable();
            $table->integer('quality_rating')->nullable();
            $table->integer('communication_rating')->nullable();
            $table->integer('expertise_rating')->nullable();
            $table->integer('professionalism_rating')->nullable();
            $table->boolean('is_approved')->nullable()->default(false);
            $table->uuid('token')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $this->addCommonDBFields($table);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_testimonials');
    }
}
