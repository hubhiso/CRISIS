<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogVerifydataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_verifydatas', function (Blueprint $table) {

            $table->increments('id');

            $table->string('case_id', 7);
            $table->integer('prov_id');
            $table->integer('amphur_id');
            $table->integer('sex');
            $table->text('sex_etc')->nullable();
            $table->integer('nation')->nullable();
            $table->text('nation_etc')->nullable();
            $table->integer('problem_case');
            $table->text('problem_case_name')->nullable();
            $table->integer('sub_problem')->nullable();
            $table->text('sub_problem_name')->nullable();
            $table->integer('group_code')->nullable();
            $table->text('group_code_name')->nullable();

            $table->text('violation_characteristics')->nullable();
            $table->text('effect')->nullable();
            $table->text('detail')->nullable();
            $table->text('need')->nullable();
            $table->date('accident_date')->nullable();
            $table->date('report_date')->nullable();
            $table->text('receiver')->nullable();
            $table->integer('receiver_id')->nullable();

            $table->date('operate_date')->nullable();
            $table->integer('type_offender')->nullable();
            $table->integer('subtype_offender')->nullable();
            $table->text('violator_name')->nullable();
            $table->text('violator_organization')->nullable();
            $table->text('offender_organization')->nullable();

            $table->text('operate_detail')->nullable();
            $table->text('status')->nullable();
            $table->integer('operate_result_status')->nullable();
            $table->text('final_operate_result')->nullable();

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
