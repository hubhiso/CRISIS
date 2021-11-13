<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAMPHURNAMEENToProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amphurs', function (Blueprint $table) {
            $table->string('AMPHUR_NAME_EN')->nullable()->after('AMPHUR_NAME');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amphurs', function (Blueprint $table) {
            //
        });
    }
}
