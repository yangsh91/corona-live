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
            <div class="navbar-collapse collapse">
                @include('layouts.navbar')
            </div>
        </div>
    </nav>

    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-2 mb-xl-3">                
                <div class="col-auto d-none d-sm-block">
                    <h3>코로나 <strong>확진자수</strong></h3>
                </div>                
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <span class="card-title mb-4" style="font-size: 1.4rem;">실시간 확진자수 &#58; </span>
                                            <span class="badge badge-danger" style="font-size: 1.4rem;"> +{{ number_format($live_cnt) }}</span>                                            
                                        </div>
                                        <div class="text-center">
                                            <span class="card-title" style="font-size: 0.6rem;color: #b1b1b1;">
                                                *본 실시간 확진자수는 행정안전부 재난문자 발송 지역별 확진자 데이터를 취합한 자료로 실제 확진자수와 차이가 있습니다.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총확진자수</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->decideCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-muted">전일대비 </span>
                                            <span class="text-danger"> {{ number_format($data->incrCnt) }}</span>
                                            <span class="text-muted">명 증가</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총완치자</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->clearCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-muted">전일대비 </span>
                                            <span class="text-success">{{ number_format($data->incrClearCnt) }}</span>
                                            <span class="text-muted">명 증가</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총사망자</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->deathCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-muted">전일대비 </span>
                                            <span class="text-danger">{{ number_format($data->incrDeathCnt) }}</span>
                                            <span class="text-muted">명 증가</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총검사자</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->accExamCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-muted">전일대비 </span>
                                            <span class="text-warning">{{ number_format($data->incrExamCnt) }}</span>
                                            <span class="text-muted">명 증가</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">일일 확진자수</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">연령대별 확진자수</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0" id="tbl_age_static">                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">                            
                            <h5 class="card-title mb-0">지역별 누적 확진자수</h5>                            
                        </div>
                        <div class="card-body px-4">
                            <div id="region_map" style="height:350px;"></div>
                        </div>
                    </div>
                </div>
                <!--
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Calendar</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="datetime_calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">월별 확진자수</h5>
                        </div>
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg">
                                <canvas id="chartjs-dashboard-bar"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">지역별 감염자 통계</h5>
                        </div>
                        <table class="table table-hover my-0" id="tbl_region_cnt" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th>확진자</th>
                                    <th>사망자</th>
                                    <th>완치자</th>
                                    <th>전일대비</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div> 
                
                <div class="col-md-5 d-flex">
                    <div class="card flex-fill table-wrapper-scroll-y my-custom-scrollbar">
                        <div class="card-header">
                            <h5 class="card-title mb-0">지역별 실시간 확진자 알림</h5>
                        </div>
                        <table class="table table-hover my-0" id="tbl_region_notify" style="text-align: center;">
                            <colgroup>
                                <col style="width: 55%;">
                                <col style="width: 45%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th>내용</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notiRows as $key => $noti)
                                    <tr @if($key >= 17) class="notify_hidden" style="display: none;" @endif>
                                        <td> {{ $noti['region'] }} {{ $noti['city'] }} </td>
                                        <td> {{ $noti['msg_sub'] }} </td>
                                    </tr>                                                                                 
                                @endforeach
                            </tbody>
                        </table>

                        <div class="w-100">       
                            <div class="col-sm-12">
                                <div class="card">                            
                                    <button type="button" class="btn btn-primary" id="btn_more_notify">더보기</button>
                                </div>                                
                            </div>                                             
                        </div>
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
    <script src="https://jvectormap.com/js/jquery-jvectormap-kr-mill.js"></script>
	<script>
        var grp = @json($weekData);        
        var labels = new Array();
        var days = new Array();             
        

        for(var i=7;i>=1;i--){            
            labels.push(grp.item[i].stateDt);
            days.push(grp.item[i].dayStateCnt);
        }

		$(function() {

            $("#{{ $mode }}").addClass("active");

			var ctx = document.getElementById('chartjs-dashboard-line').getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, 'rgba(215, 227, 244, 1)');
			gradient.addColorStop(1, 'rgba(215, 227, 244, 0)');
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: 'bar',
				data: {
					labels: labels,
					datasets: [{
						label: "확진자수",
						fill: true,
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: days
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: true
							},
							stacked: true,
							ticks: {
								stepSize: 0
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}],
					}
				}
			});
		});
	</script>
	<script>
		$(function() {
            var age = @json($age);
            var ageLabel = new Array();
            var ageGrp = new Array();                                         

            
            $('#tbl_age_static').html(
                '<tbody>' +
                '<tr><td>0-19세</td><td class="text-end">' + numberWithCommas(age.ageChildren) + '명</td></tr>' +
                '<tr><td>20-39세</td><td class="text-end">' + numberWithCommas(age.ageGolden) + '명</td></tr>' +
                '<tr><td>40-59세</td><td class="text-end">' + numberWithCommas(age.ageAdult) + '명</td></tr>' +
                '<tr><td>60세 이상</td><td class="text-end">' + numberWithCommas(age.ageSilver) + '명</td></tr>' +
                '</tbody>'
            );
            

            for(var i=0;i<9;i++){
                ageLabel.push(age.item[i].gubun);
                ageGrp.push(age.item[i].confCase);

                //console.log(age.item[i].gubun);
            }

            //console.log(age);
			
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: 'pie',
				data: {
					labels: ageLabel,
					datasets: [{
						data: ageGrp,
						backgroundColor: [
                            'yellow',
                            'yellow',
                            'blue',
                            'blue',
                            'black',
                            'black',
                            'silver',
                            'silver',
                            'silver'
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
		});
	</script>
	<script>
		$(function() {

            var monArr = @json($monArr);
            var monLabel = new Array();
            var monData = new Array();

            for(var i=0;i<monArr.length;i++){   
                monLabel.push(monArr[i].dt);
                monData.push(monArr[i].cnt);
            }

			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: 'bar',
				data: {
					labels: monLabel,
					datasets: [{
						label: "확진자수 : ",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: monData,
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: true
							},
							stacked: true,
							ticks: {
								stepSize: 0
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}],
					}
				}
			});
		});
	</script>
	<script>
        var region = @json($region);

		$(function() {
			$("#region_map").vectorMap({
				map: "kr_mill",
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
                    latLng: [37.53104313019439, 126.9937543561867],
                    name: "서울 (" + numberWithCommas(region.item[17].defCnt) + ")" 
                    }
                    ,{
                    latLng: [37.448570, 126.705526],
                    name: "인천 (" + numberWithCommas(region.item[14].defCnt) + ")" 
                    }
                    ,{
                    latLng: [37.329276, 127.383905],
                    name: "경기 (" + numberWithCommas(region.item[9].defCnt) + ")" 
                    }
                    ,{
                    latLng: [36.336884, 127.387824],
                    name: "대전 (" + numberWithCommas(region.item[12].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.820656906917186, 128.58178659163752],
                    name: "대구 (" + numberWithCommas(region.item[15].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.142493511440335, 126.83434103761101],
                    name: "광주 (" + numberWithCommas(region.item[13].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.530716207011956, 129.27332887472036],
                    name: "울산 (" + numberWithCommas(region.item[11].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.14857382293423, 129.07999447299827],
                    name: "부산 (" + numberWithCommas(region.item[16].defCnt) + ")" 
                    }                    
                    ,{
                    latLng: [36.519099870678744, 127.2691745879341],
                    name: "세종 (" + numberWithCommas(region.item[10].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.814752337155156, 127.12515640069495],
                    name: "전북 (" + numberWithCommas(region.item[5].defCnt) + ")" 
                    }
                    ,{
                    latLng: [34.740666956058874, 126.9423513051883],
                    name: "전남 (" + numberWithCommas(region.item[4].defCnt) + ")" 
                    }
                    ,{
                    latLng: [36.43925740840318, 128.64485292232828],
                    name: "경북 (" + numberWithCommas(region.item[3].defCnt) + ")" 
                    }
                    ,{
                    latLng: [35.403923741437396, 128.6698237897298],
                    name: "경남 (" + numberWithCommas(region.item[2].defCnt) + ")" 
                    }
                    ,{
                    latLng: [36.875949551495616, 127.86238911046159],
                    name: "충북 (" + numberWithCommas(region.item[7].defCnt) + ")" 
                    }
                    ,{
                    latLng: [36.47443553397595, 126.80845426001015],
                    name: "충남 (" + numberWithCommas(region.item[6].defCnt) + ")" 
                    }
                    ,{
                    latLng: [37.78137174624893, 128.4001384530638],
                    name: "강원 (" + numberWithCommas(region.item[16].defCnt) + ")" 
                    }
                    ,{
                    latLng: [33.33356461970605, 126.54899111552427],
                    name: "제주 (" + numberWithCommas(region.item[16].defCnt) + ")" 
                    }

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

            var html = "";            
            for(var i=0;i<19;i++){
                html += "<tr>";
                html += "<td>" + region.item[i].gubun + "</td>";
                html += "<td>" + numberWithCommas(region.item[i].defCnt) + "</td>";
                html += "<td>" + numberWithCommas(region.item[i].deathCnt) + "</td>";
                html += "<td><span class=\"badge badge-success\"> +" + numberWithCommas(region.item[i].isolClearCnt) + "</span></td>";
                html += "<td><span class=\"badge badge-danger\"> +" + numberWithCommas(region.item[i].incDec) + "</span></td>";
                html += "</tr>";
            }            
            $("#tbl_region_cnt tbody").html(html);

			setTimeout(function() {
				$(window).trigger('resize');
			}, 250);
		});
	</script>
	<script>        
        $(function() {
            $('#datetime_calendar').datetimepicker({
                inline: true,
				sideBySide: false,
                format: 'L',
                maxDate: new Date(),
                onSelect: function(dateText, inst) {
                    //console.log(dateText);
                }
            });
            
            
            $("#btn_more_notify").click(function(){                        
                $(".notify_hidden").css("display","");            
                $("#btn_more_notify").css("display", "none");
            });
            
		});

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        
	</script>

@endsection