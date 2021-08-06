<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNotify2021080600 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_notify', function (Blueprint $table) {                        
            $table->string('send_no', 30);
            $table->string('location_id', 30);
            $table->string('location_nm', 30)->nullable();
            $table->text('msg')->nullable();            
            $table->dateTime('send_dt')->nullable();            
            $table->primary('send_no');
            $table->index('location_id');
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
