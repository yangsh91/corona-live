<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNotify2021080601 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tbl_notify', function ($table) {            
            $table->string('location_id', 255)->change();      
        });

        Schema::table('tbl_users', function ($table) {            
            $table->string('id', 100)->change();
            $table->string('password', 100)->change();
            $table->string('email', 150)->change();
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
