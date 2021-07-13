<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoronaRegion5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tbl_corona_region', function ($table) {            
            $table->integer('defCnt',false, false)->change();
            $table->integer('incDec',false, false)->change();
            $table->integer('deathCnt',false, false)->change();
            $table->integer('isolIngCnt',false, false)->change();
            $table->integer('isolClearCnt',false, false)->change();
            $table->integer('localOccCnt',false, false)->change();
            $table->integer('overFlowCnt',false, false)->change();
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
