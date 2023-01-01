<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Traits\DatabaseOperations;

class CreateSoftwareTable extends Migration
{
    use DatabaseOperations;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->index('uuid')->unique()->nullable();
            $table->unsignedBigInteger('user_id')->index()->nullable();
            $table->unsignedBigInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('sub_category_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('software_application')->nullable();
            $table->decimal('price', 28,2)->default(0)->nullable();
            $table->integer('estimated_lead_time')->nullable();
            $table->longText('requirement_for_client')->nullable();
            $table->integer('number_of_simultaneous_projects')->nullable();

            $table->boolean('is_terms_accepted')->nullable()->default(false);
            $table->boolean('is_privacy_accepted')->nullable()->default(false);
            $table->boolean('is_active')->default(true)->nullable();
            $table->boolean('is_featured')->default(false);

            $table->integer('views')->default(0)->nullable();
            $table->timestamp('last_viewed')->nullable();
            $this->addCommonDBFields($table);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('RESTRICT')->onUpdate('RESTRICT');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software');
    }
}
