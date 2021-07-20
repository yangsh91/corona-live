<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContentModel extends Model
{
    use HasFactory;


    public function worldList() 
    {   
        DB::enableQueryLog();
        
        $query = DB::table('tbl_corona_world')     
                    ->whereRaw('create_dt = date_format((select create_dt from tbl_corona_world order by create_dt desc limit 1), "%Y-%m-%d")')                
                    ->orderByDesc('natDefCnt')
                    ->get();
               
        dd(DB::enableQueryLog());

        //select * from tbl_corona_world where create_dt = DATE_FORMAT((select create_dt from tbl_corona_world order by create_dt desc limit 1), '%Y-%m-%d');
        return $query;
        
    }
}
