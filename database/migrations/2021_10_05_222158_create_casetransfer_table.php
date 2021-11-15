<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasetransferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('casetransfer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('case_id',8)->nullable();
            $table->integer('provid')->nullable();
            $table->integer('prev_provid')->nullable();
            $table->string('ousername')->nullable();
            $table->string('prev_ousername')->nullable();
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
        //
    }
}
