@extends('layouts.app')

@section('content')

<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">CLFE</span>
        </a>

        @include('layouts.left')
        
    </div>
</nav>

<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle d-flex">
           <i class="hamburger align-self-center"></i>
        </a>
        
        <div class="navbar-collapse collapse">
            @include('layouts.navbar')
        </div>
    </nav>

    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">                
                <div class="col-auto d-none d-sm-block">
                    <h3>세계 코로나 <strong>확진자수</strong></h3>
                </div>                
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">확진자수 많은국가 TOP 5</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>
                                <table class="table mb-0" id="tbl_cnt_list"></table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">                            
                            <h5 class="card-title mb-0">글로벌맵</h5>                            
                        </div>
                        <div class="card-body px-4">
                            <div id="region_map" style="height:350px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">나라별 백신 접종률</h5>
                        </div>
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg">
                                <canvas id="chartjs-dashboard-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-2 mb-xl-3">                
                <div class="col-auto d-none d-sm-block">
                    <h3>국가별 감염자 통계</h3>
                </div>                
            </div>

            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0" id="tbl_world_cnt_1" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th>확진자</th>
                                    <th>사망자</th>                                    
                                    <th>전일대비</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>    
                            
                <div class="col-md-6 d-flex">
                    <div class="card flex-fill">
                        <table class="table table-hover my-0" id="tbl_world_cnt_2" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th>확진자</th>
                                    <th>사망자</th>                                    
                                    <th>전일대비</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>

                <div class="w-100">       
                    <div class="col-sm-12">
                        <div class="card">                            
                            <button type="button" class="btn btn-primary" id="btn_more_world">더보기</button>
                        </div>                                
                    </div>                                             
                </div>
            </div>
    </main>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</div>

<!-- <script src="{{ asset('assets/js/vendor.js') }}"></script> -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script>

    $(function(){

        $("#{{ $mode }}").addClass("active");

        var jsonNa = @json($jsonNa);
        var wLabel = new Array();
        var wCnt = new Array();        

        $("#region_map").vectorMap({
				map: "world_mill",
				normalizeFunction: "polynomial",
				hoverOpacity: .7,
				hoverColor: false,
				regionStyle: {
					initial: {
						fill: "#e3eaef"
					}
				},
				markerStyle: {
					initial: {
						"r": 9,
						"fill": window.theme.primary,
						"fill-opacity": .95,
						"stroke": "#fff",
						"stroke-width": 7,
						"stroke-opacity": .4
					},
					hover: {
						"stroke": "#fff",
						"fill-opacity": 1,
						"stroke-width": 1.5
					}
				},
				backgroundColor: "transparent",
				zoomOnScroll: false,                
                markers: [
                    {
                        latLng: [39.81208805209909, -101.14322760207529],
                        name: "미국 (" + numberWithCommas(jsonNa[0].nationDefCnt) + ")" 
                    },
                    {
                        latLng: [23.52794008190942, 79.47201030764019],
                        name: "인도 (" + numberWithCommas(jsonNa[1].nationDefCnt) + ")" 
                    },
                    {
                        latLng: [-8.54358700909542, -53.97329128438263],
                        name: "브라질 (" + numberWithCommas(jsonNa[2].nationDefCnt) + ")" 
                    },
                    {
                        latLng: [62.79521536150938, 92.28085411315915],
                        name: "러시아 (" + numberWithCommas(jsonNa[3].nationDefCnt) + ")" 
                    },
                    {
                        latLng: [46.74028142081584, 2.6324183628787026],
                        name: "프랑스 (" + numberWithCommas(jsonNa[4].nationDefCnt) + ")" 
                    },                    
                ],
                onRegionTipShow: function(event, tip, code){                                  
                    /*
                    for(var i=0;i<region.item.length;i++)                        
                        if(code == region.item[i].regionCode){
                             //tip.html('확진자수 : ' + region.item[i].seq);
                             tip.html(region.item[i].region + ' : ' + region.item[i].defCnt);
                        }
                     }
                     */
                },
                onRegionOver: function(event, tip, code){
                    //console.log('region over', tip, code);                                       
                }				
			});

        wHtml_1 = "";
        wHtml_2 = "";
        for(var i=0;i<jsonNa.length;i++){    

            if(i < 95){
                if(i > 45){
                    wHtml_1 += "<tr class='naBlock' style='display: none;'>";
                }else{
                    wHtml_1 += "<tr>";
                }                
                
                wHtml_1 += "<td>" +  jsonNa[i].na_nm + "</td>";
                wHtml_1 += "<td>" +  numberWithCommas(jsonNa[i].nationDefCnt) + "</td>";
                wHtml_1 += "<td>" +  numberWithCommas(jsonNa[i].natDeathCnt) + "</td>";            
                wHtml_1 += "<td><span class=\"badge badge-danger\">+" +  numberWithCommas(jsonNa[i].defCnt) + "</span></td>";
                wHtml_1 += "</tr>";
            }else{
                if(i > 140){
                    wHtml_2 += "<tr class='naBlock' style='display: none;'>";
                }else{
                    wHtml_2 += "<tr>";
                }
                wHtml_2 += "<td>" +  jsonNa[i].na_nm + "</td>";
                wHtml_2 += "<td>" +  numberWithCommas(jsonNa[i].nationDefCnt) + "</td>";
                wHtml_2 += "<td>" +  numberWithCommas(jsonNa[i].natDeathCnt) + "</td>";            
                wHtml_2 += "<td><span class=\"badge badge-danger\">+" +  numberWithCommas(jsonNa[i].defCnt) + "</span></td>";
                wHtml_2 += "</tr>";
            }
        }

        //wHtml += "</tbody>";

        //console.log(html);

        //if(!html){
        $("#tbl_world_cnt_1 tbody").html(wHtml_1);
        $("#tbl_world_cnt_2 tbody").html(wHtml_2);
        //}

        for(var i=0;i<5;i++){
            wLabel.push(jsonNa[i].na_nm);
            wCnt.push(jsonNa[i].nationDefCnt);            
        }
			
		new Chart(document.getElementById("chartjs-dashboard-pie"), {
			type: 'pie',
			data: {
			labels: wLabel,
			datasets: [{
			data: wCnt,
			backgroundColor: [
                'dodgerblue',                    
                'orange',
                'green',                    
                'red',                    
                'blue'
			],
			borderWidth: 5
		    }]
		},
		options: {
			responsive: !window.MSInputMethodContext,
			maintainAspectRatio: false,
			legend: {
			display: false
			},
			cutoutPercentage: 75
			}
		});
		
        var tbl_cnt = "";
        tbl_cnt += "<tbody>"
        for(var i=0;i<wLabel.length;i++){
            tbl_cnt += "<tr>";
            tbl_cnt += "<td>" + wLabel[i] + "</td>";
            tbl_cnt += "<td>" + numberWithCommas(wCnt[i]) + "명</td>";
            tbl_cnt += "</tr>";   
        }
        tbl_cnt += "</tbody>";
        $("#tbl_cnt_list").html(tbl_cnt);


        $("#btn_more_world").click(function(){                        
            $(".naBlock").css("display","");            
            $("#btn_more_world").css("display", "none");
        });


        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    });

</script>


@endsection