<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['1', '2', '3'])->comment('1 for software 2 for service and 3 for job');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });


        if (Schema::hasTable('entity_fields')) {
            $data = [
                [
                    'name'   => 'Development',
                    'type'   => 2,
                    'status' => true
                ],
                [
                    'name'   => 'Programming',
                    'type'   => 2,
                    'status' => true
                ],
                [
                    'name'   => 'Coding Competence',
                    'type'   => 2,
                    'status' => true
                ],
                [
                    'name' => 'Database',
                    'type' => 2,
                    'status' => true
                ]
            ];
    
            \DB::table('entity_fields')->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_fields');
    }
}
