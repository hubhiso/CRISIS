<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupandactiveToOfficer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('officers', function (Blueprint $table) {
            //
            $table->enum('active', ['yes', 'no'])->nullable()->after('id');

            $table->enum('mailwarning', ['yes', 'no'])->nullable()->after('active');
            $table->dateTime('mailwarning_at')->nullable()->after('mailwarning');
            
            $table->string('group')->nullable()->after('position');
            $table->string('g_view_all')->nullable()->after('group');
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
