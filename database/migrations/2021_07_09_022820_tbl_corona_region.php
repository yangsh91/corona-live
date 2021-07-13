<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoronaRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tbl_corona_region', function(Blueprint $table){
            $table->string('seq', 30);
            $table->date('create_dt');
            $table->string('region_nm', 30);
            $table->string('region_cn', 30);
            $table->string('region_en', 30);
            $table->integer('defCnt', false, true)->default(0);
            $table->integer('incDec', false, true)->default(0);
            $table->integer('deathCnt', false, true)->default(0);
            $table->integer('isolIngCnt', false, true)->default(0);
            $table->integer('isolClearCnt', false, true)->default(0);
            $table->integer('localOccCnt', false, true)->default(0);
            $table->integer('overFlowCnt', false, true)->default(0);
            $table->integer('qurRate', false, true)->default(0);
            $table->dateTime('stdDay');
            $table->dateTime('update_dt');
            $table->primary(['seq', 'create_dt', 'region_nm']);            
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
