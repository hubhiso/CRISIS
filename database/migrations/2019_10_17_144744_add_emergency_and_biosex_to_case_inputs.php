<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmergencyAndBiosexToCaseInputs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('case_inputs', function (Blueprint $table) {
            //
            $table->enum('biosex', ['male', 'female'])->nullable();
            $table->enum('emergency', ['yes', 'no'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('case_inputs', function (Blueprint $table) {
            //
        });
    }
}
