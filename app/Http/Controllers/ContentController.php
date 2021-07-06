<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CurlController as curl;

class ContentController extends Controller
{
    public function index()
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


        $result = curl::getCurl($url, $queryParams);
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


        $weekResult = curl::getCurl($url, $daysParam);
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
        
        $korResult = curl::getCurl($url, $queryParams);
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
        $ageParam .= '&' . urlencode('startCreateDt') . '=' . urlencode($date); /**/
        $ageParam .= '&' . urlencode('endCreateDt') . '=' . urlencode($date); /**/


        $ageResult = curl::getCurl($ageUrl, $ageParam);
        $ageResult = json_decode($ageResult);

        $ageResult->body->items->ageChildren = $ageResult->body->items->item[0]->confCase + $ageResult->body->items->item[1]->confCase;
        $ageResult->body->items->ageGolden = $ageResult->body->items->item[2]->confCase + $ageResult->body->items->item[3]->confCase;
        $ageResult->body->items->ageAdult = $ageResult->body->items->item[4]->confCase + $ageResult->body->items->item[5]->confCase;
        $ageResult->body->items->ageSilver = $ageResult->body->items->item[6]->confCase + $ageResult->body->items->item[7]->confCase + $ageResult->body->items->item[8]->confCase;
        

        
        return view('main.content',[
                                    'data' => $result->body->items,
                                    'weekData' => $weekResult->body->items, 
                                    'region' => $korResult->body->items,
                                    'age'    => $ageResult->body->items
                                    ]
                    );
            //->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }
    
}
