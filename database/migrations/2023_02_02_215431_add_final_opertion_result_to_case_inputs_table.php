<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalOpertionResultToCaseInputsTable extends Migration
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
            $table->text('final_operate_result')->nullable()->after('operate_result_status');
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
