<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id')->index()->nullable();
            $table->unsignedBigInteger('permission_id')->index()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('admin_permissions');
    }
}
