<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officer_evaluates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->integer('eva1')->nullable();
            $table->integer('eva2')->nullable();
            $table->integer('eva3')->nullable();
            $table->integer('eva4')->nullable();
            $table->integer('eva5')->nullable();
            $table->text('eva_comment')->nullable();
            $table->date('date_notshow')->nullable();
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
