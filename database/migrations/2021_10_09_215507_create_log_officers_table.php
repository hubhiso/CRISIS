<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogOfficersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_officers', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('active', ['yes', 'no']);
            $table->string('username');
            $table->string('name');
            $table->string('nameorg');
            $table->string('tel');
            $table->string('email');
            $table->integer('area_id')->nullable();
            $table->integer('prov_id')->nullable();
            $table->string('position');
            $table->string('group')->nullable();
            $table->string('g_view_all')->nullable();
            $table->enum('p_view_all', ['yes', 'no']);
            $table->enum('p_receive', ['yes', 'no']);
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
        Schema::dropIfExists('log_officers');
    }
}
