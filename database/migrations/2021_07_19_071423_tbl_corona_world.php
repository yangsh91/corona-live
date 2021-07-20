<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoronaWorld extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_corona_world', function(Blueprint $table){
            $table->integer('seq', false, true);
            $table->date('create_dt');
            $table->string('areaNm', 30);
            $table->string('areaNm_cn', 30);
            $table->string('areaNm_en', 30);
            $table->string('nationNm', 30);
            $table->string('nationNm_cn', 30);
            $table->string('nationNm_en', 30);
            $table->integer('natDefCnt', false, false)->default(0);
            $table->integer('natDeathCnt', false, false)->default(0);
            $table->integer('natDeathRate', false, false)->default(0);                        
            $table->dateTime('stdDay');
            $table->dateTime('update_dt');
            $table->primary(['seq', 'create_dt', 'nationNm']);
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
