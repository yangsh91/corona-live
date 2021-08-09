<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CurlController as curl;
use App\Models\ContentModel;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{

    public function __construct()
    {        
                
        $notiList = DB::table('tbl_notify as a')            
            ->select(DB::raw('a.*, b.region, b.city'))
            ->leftJoin('tbl_code as b', 'a.location_id', '=', 'b.location_id')
            ->whereRaw("date_format(send_dt, '%Y-%m-%d') = date_format(NOW(), '%Y-%m-%d')")
            ->orderByDesc('send_dt')
            ->get();

        $live_cnt = 0;       
        $notiRows = [];     
        foreach($notiList as $key => $rows){

            $msg = $rows->msg;
            
            preg_match('/확진자(.*?)발생/', $msg, $msgRow);            
            
            if(!empty($msgRow)){
                if(!empty($msgRow[1])){
                    
                    $cnt = preg_replace("/[^0-9]*/s", "", $msgRow[1]);
                    
                    $cntRow = explode('명', $msgRow[1]);
                    if(preg_match("/^[0-9]/i", trim($cntRow[0]))){
                        $live_cnt += (integer) trim($cntRow[0]);
                        
                        array_push($notiRows, array(
                            'region' => $rows->region,
                            'city' => $rows->city,
                            'msg' => $rows->msg,
                            'msg_sub' => $msgRow[1],
                            'send_dt' => $rows->send_dt
                        ));
                    }
                }
            }
        }

        $this->live_cnt = $live_cnt;
        $this->notiRows = $notiRows;

    }

    public function main()
    {        

        $key = urlencode(iconv('euc-kr','utf-8','Wq24xQBvYdlZ5SkdIEs9vysJpMQ09E7dLw3oLtQWkbIYp+l2tph1UjJ9n+19lwst+NngPiF9AxA7aPCEBWI1kw=='));        

        $date = date_create();
        $date = date_format($date, 'Ymd');
        $yesterday = date('Ymd', strtotime('-1 day', strtotime($date)));
        $weekDay = date('Ymd', strtotime('-8 day', strtotime($date)));

        $url = 'http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19InfStateJson'; /*URL*/
        $queryParams = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('20'); /**/
        $queryParams .= '&' . urlencode('startCreateDt') . '=' . urlencode($yesterday); /**/
        $queryParams .= '&' . urlencode('endCreateDt') . '=' . urlencode($date); /**/

 
        $result = curl::getXml($url, $queryParams);
        $result = json_decode($result);        

        // 확진자 증가수
        $result->body->items->incrCnt = $result->body->items->item[0]->decideCnt - $result->body->items->item[1]->decideCnt;
        // 사망자 증가수
        $result->body->items->incrDeathCnt = $result->body->items->item[0]->deathCnt - $result->body->items->item[1]->deathCnt;
        // 완치자 증가수
        $result->body->items->incrClearCnt = $result->body->items->item[0]->clearCnt - $result->body->items->item[1]->clearCnt;
        // 검사자 증가수
        $result->body->items->incrExamCnt = $result->body->items->item[0]->accExamCnt - $result->body->items->item[1]->accExamCnt;

        $daysParam = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $daysParam .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $daysParam .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
        $daysParam .= '&' . urlencode('startCreateDt') . '=' . urlencode($weekDay); /**/
        $daysParam .= '&' . urlencode('endCreateDt') . '=' . urlencode($date); /**/


        $weekResult = curl::getXml($url, $daysParam);
        $weekResult = json_decode($weekResult);

        for($i=0;$i<sizeof($weekResult->body->items->item);$i++){           
            $wDay = date_create($weekResult->body->items->item[$i]->stateDt);
            $weekResult->body->items->item[$i]->stateDt = date_format($wDay, 'm-d');
            
            if($i < 8){
            $weekResult->body->items->item[$i]->dayStateCnt = $weekResult->body->items->item[$i]->decideCnt - $weekResult->body->items->item[$i+1]->decideCnt;
            }
            
            //echo $weekResult->body->items->item[$i]->decideCnt .'-'. $weekResult->body->items->item[$i+1]->decideCnt . '<br/>';

        }



        $url = 'http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19SidoInfStateJson'; /*URL*/
        
        $korResult = curl::getXml($url, $queryParams);
        $korResult = json_decode($korResult);
                

        for($i=0;$i<sizeof($korResult->body->items->item);$i++){
            
            $regionNm = $korResult->body->items->item[$i]->gubunEn;
            
            switch($regionNm){
                case "Jeju": $regionCode = "KR-49"; $region = "제주도"; break;
                case "Gyeongsangnam-do": $regionCode = "KR-48"; $region = "경상남도"; break;
                case "Gyeongsangbuk-do": $regionCode = "KR-47"; $region = "경상북도"; break;
                case "Jeollanam-do": $regionCode = "KR-46"; $region = "전라남도"; break;
                case "Jeollabuk-do": $regionCode = "KR-45"; $region = "전라북도"; break;
                case "Chungcheongnam-do": $regionCode = "KR-44"; $region = "충청남도"; break;
                case "Chungcheongbuk-do": $regionCode = "KR-43"; $region = "충청북도"; break;
                case "Gangwon-do": $regionCode = "KR-42"; $region = "강원도"; break;
                case "Gyeonggi-do": $regionCode = "KR-41"; $region = "경기도"; break;
                case "Sejong": $regionCode = "KR-50"; $region = "세종"; break;
                case "Ulsan": $regionCode = "KR-31"; $region = "울산"; break;
                case "Daejeon": $regionCode = "KR-30"; $region = "대전"; break;
                case "Gwangju": $regionCode = "KR-29"; $region = "광주"; break;
                case "Incheon": $regionCode = "KR-28"; $region = "인천"; break;
                case "Daegu": $regionCode = "KR-27"; $region = "대구"; break;
                case "Busan": $regionCode = "KR-26"; $region = "부산"; break;
                case "Seoul": $regionCode = "KR-11"; $region = "서울"; break;
                default : $regionCode = ""; $region = ""; break;
            }

            $korResult->body->items->item[$i]->regionCode = $regionCode;
            $korResult->body->items->item[$i]->region = $region;            

        }
        
        

        $ageUrl = "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19GenAgeCaseInfJson";

        $ageParam = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $ageParam .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $ageParam .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
        $ageParam .= '&' . urlencode('startCreateDt') . '=' . urlencode($yesterday); /**/
        $ageParam .= '&' . urlencode('endCreateDt') . '=' . urlencode($date); /**/


        $ageResult = curl::getXml($ageUrl, $ageParam);
        $ageResult = json_decode($ageResult);

        $ageResult->body->items->ageChildren = $ageResult->body->items->item[0]->confCase + $ageResult->body->items->item[1]->confCase;
        $ageResult->body->items->ageGolden = $ageResult->body->items->item[2]->confCase + $ageResult->body->items->item[3]->confCase;
        $ageResult->body->items->ageAdult = $ageResult->body->items->item[4]->confCase + $ageResult->body->items->item[5]->confCase;
        $ageResult->body->items->ageSilver = $ageResult->body->items->item[6]->confCase + $ageResult->body->items->item[7]->confCase + $ageResult->body->items->item[8]->confCase;
        

        //curl::scrapper();

        $mon_cnt = DB::table('tbl_corona_region')
                     ->select(DB::raw(
                         'concat(date_format(create_dt, "%m"), "월") as dt
                          , sum(incDec) as cnt'))
                     //->select(DB::raw('count(*) as cnt '))                     
                     ->groupBy('dt')
                     ->get();
              
        
        return view('main.content',[
                                    'live_cnt' => $this->live_cnt,
                                    'notiRows' => $this->notiRows,
                                    'data' => $result->body->items,
                                    'weekData' => $weekResult->body->items, 
                                    'region' => $korResult->body->items,
                                    'age'    => $ageResult->body->items,
                                    'monArr' => $mon_cnt,
                                    'mode' => 'home'
                                    ]
                    );
            //->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }


    public function worldLive()
    {        
        
        //echo $this->test->worldList();
        $dataRow = DB::table('tbl_corona_world')   
          
                    ->select(DB::raw('seq as seq, create_dt as dt, nationNm as na_nm, nationNm_en, natDefCnt as nationDefCnt, natDeathCnt'),
                        DB::raw('natDefCnt - (select natDefCnt from tbl_corona_world where nationNm = na_nm and create_dt = 
                        (select create_dt from tbl_corona_world where create_dt < 
                        (select create_dt from tbl_corona_world order by create_dt desc limit 1) order by create_dt desc limit 1)) 
                        as defCnt'))
                    ->whereRaw('create_dt = date_format((select create_dt from tbl_corona_world order by create_dt desc limit 1), "%Y-%m-%d")')                
                    ->orderByDesc('natDefCnt')
                    ->get();                                    

        return view('main.world',[
                'live_cnt' => $this->live_cnt,
                'notiRows' => $this->notiRows,
                'jsonNa' => $dataRow,
                'mode' => 'world'
                ]);            

    }


    public function regionApi()
    {

        $url = "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19SidoInfStateJson";
        $key = urlencode(iconv('euc-kr','utf-8','Wq24xQBvYdlZ5SkdIEs9vysJpMQ09E7dLw3oLtQWkbIYp+l2tph1UjJ9n+19lwst+NngPiF9AxA7aPCEBWI1kw=='));

        $params = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $params .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $params .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
        $params .= '&' . urlencode('startCreateDt') . '=' . urlencode('20210711'); /**/
        $params .= '&' . urlencode('endCreateDt') . '=' . urlencode('20210719'); /**/

        $result = curl::getXml($url, $params);
        $result = json_decode($result);

        $data = $result->body->items;      
                
        for($i=0;$i<sizeof($data->item);$i++){

            $date = date_create($data->item[$i]->createDt);
            $createDt = date_format($date, "Y-m-d h:i:s");            

            $results = DB::table('tbl_corona_region')->insert(
                [
                 'seq' => $data->item[$i]->seq,
                 'create_dt' => $createDt,
                 'region_nm' => $data->item[$i]->gubun,
                 'region_cn' => $data->item[$i]->gubunCn,
                 'region_en' => $data->item[$i]->gubunEn,
                 'defCnt' => $data->item[$i]->defCnt,
                 'incDec' => $data->item[$i]->incDec,
                 'deathCnt' => $data->item[$i]->deathCnt,
                 'isolIngCnt' => $data->item[$i]->isolIngCnt,
                 'isolClearCnt' => $data->item[$i]->isolClearCnt,
                 'localOccCnt' => $data->item[$i]->localOccCnt,
                 'overFlowCnt' => $data->item[$i]->overFlowCnt,
                 'qurRate' => $data->item[$i]->qurRate 
                ]                              
            );
            
            if(! $result){
                echo "sql error!";
                break;
            }

        }
        
        echo "SUCCESS!!!";

    }

    public function worldApi()
    {

        $url = "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19NatInfStateJson";
        $key = urlencode(iconv('euc-kr','utf-8','Wq24xQBvYdlZ5SkdIEs9vysJpMQ09E7dLw3oLtQWkbIYp+l2tph1UjJ9n+19lwst+NngPiF9AxA7aPCEBWI1kw=='));

        $params = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $params .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $params .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
        $params .= '&' . urlencode('startCreateDt') . '=' . urlencode('20210721'); /**/
        $params .= '&' . urlencode('endCreateDt') . '=' . urlencode('20210731'); /**/

        $result = curl::getXml($url, $params);
        $result = json_decode($result);

        $data = $result->body->items;      
                
        for($i=0;$i<sizeof($data->item);$i++){

            $date = date_create($data->item[$i]->createDt);
            $createDt = date_format($date, "Y-m-d h:i:s");

            $results = DB::table('tbl_corona_world')->insert(
                [
                 'seq' => $data->item[$i]->seq,
                 'create_dt' => $createDt,
                 'areaNm' => $data->item[$i]->areaNm,
                 'areaNm_cn' => $data->item[$i]->areaNmCn,
                 'areaNm_en' => $data->item[$i]->areaNmEn,
                 'nationNm' => $data->item[$i]->nationNm,
                 'nationNm_cn' => $data->item[$i]->nationNmCn,
                 'nationNm_en' => $data->item[$i]->nationNmEn,
                 'natDefCnt' => $data->item[$i]->natDefCnt,
                 'natDeathCnt' => $data->item[$i]->natDeathCnt,
                 'natDeathRate' => $data->item[$i]->natDeathRate,
                ]                          
                
            );
            
            if(! $result){
                echo "sql error!";
                break;
            }

        }

    }


    public function getNotify()
    {


        $url = "http://apis.data.go.kr/1741000/DisasterMsg3/getDisasterMsg1List";
        $key = urlencode(iconv('euc-kr','utf-8','Wq24xQBvYdlZ5SkdIEs9vysJpMQ09E7dLw3oLtQWkbIYp+l2tph1UjJ9n+19lwst+NngPiF9AxA7aPCEBWI1kw=='));

        $params = '?' . urlencode('ServiceKey') . '=' . $key; /*Service Key*/
        $params .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
        $params .= '&' . urlencode('numOfRows') . '=' . urlencode('200'); /**/ 
        $params .= '&' . urlencode('type') . '=' . urlencode('xml');       

        $result = curl::getXml($url, $params);
        $result = json_decode($result);

        if(sizeof($result->row) > 0){

            foreach($result->row as $data){
                

                $chkNotify = DB::table('tbl_notify')
                ->where('send_no', '=', $data->md101_sn)
                ->count();
                

                if($chkNotify > 0){
                    $re = DB::table('tbl_notify')
                        ->where(['send_no' => $data->md101_sn], ['location_id' => $data->location_id])
                        ->update(['location_id' => $data->location_id], ['location_nm' => $data->location_name], ['msg' => $data->msg]);
                }else{
                    $re = DB::table('tbl_notify')
                    ->insert(
                        ['send_no' => $data->md101_sn , 'location_id' => $data->location_id, 'location_nm' => $data->location_name, 'msg' => $data->msg, 'send_dt' => $data->create_date]
                    );
                }

                if(!$re){
                    echo "failed";
                    break;
                }

            }
        }


        echo "success";


    }
    
}
