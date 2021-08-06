<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_code', function (Blueprint $table) {            
            $table->string('code_gb', 30);
            $table->string('location_id', 30);
            $table->string('region', 30);
            $table->string('city', 30);
            $table->string('stdcode', 30);
            $table->dateTime('insert_dt')->nullable();
            $table->dateTime('update_dt')->nullable();
            $table->primary(['code_gb', 'location_id']);            
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
