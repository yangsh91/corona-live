<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblCoronaWorld2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tbl_corona_world', function ($table) {            
            $table->string('areaNm', 50)->change();
            $table->string('areaNm_cn', 50)->change();
            $table->string('areaNm_en', 50)->change();
            $table->string('nationNm', 50)->change();
            $table->string('nationNm_cn', 50)->change();
            $table->string('nationNm_en', 50)->change();
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
