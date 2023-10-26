<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharecasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sharecases', function (Blueprint $table) {

            $table->increments('id');
            $table->enum('active', ['yes', 'no']);
            $table->string('case_id', 7);
            $table->string('user_receiver');
            $table->string('user_share');

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
