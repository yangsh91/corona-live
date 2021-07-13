<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoronaRegion4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_corona_region', function ($table) {            
            $table->integer('defCnt',false, true)->change();
            $table->integer('incDec',false, true)->change();
            $table->integer('deathCnt',false, true)->change();
            $table->integer('isolIngCnt',false, true)->change();
            $table->integer('isolClearCnt',false, true)->change();
            $table->integer('localOccCnt',false, true)->change();
            $table->integer('overFlowCnt',false, true)->change();
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
