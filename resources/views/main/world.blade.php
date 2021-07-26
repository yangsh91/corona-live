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
        <!--
        <form class="form-inline d-none d-sm-inline-block">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn" type="button">
        <i class="align-middle" data-feather="search"></i>
      </button>
                </div>
            </div>
        </form>
        -->
        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator">4</span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                        <div class="dropdown-menu-header">
                            4 New Notifications
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <i class="text-danger" data-feather="alert-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Update completed</div>
                                        <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                                        <div class="text-muted small mt-1">30m ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <i class="text-warning" data-feather="bell"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Lorem ipsum</div>
                                        <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                                        <div class="text-muted small mt-1">2h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <i class="text-primary" data-feather="home"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Login from 192.186.1.8</div>
                                        <div class="text-muted small mt-1">5h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <i class="text-success" data-feather="user-plus"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">New connection</div>
                                        <div class="text-muted small mt-1">Christina accepted your request.</div>
                                        <div class="text-muted small mt-1">14h ago</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Show all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="message-square"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                        <div class="dropdown-menu-header">
                            <div class="position-relative">
                                4 New Messages
                            </div>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <img src="{{ asset('assets/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">                                        
                                    </div>
                                    <div class="col-10 pl-2">
                                        <div class="text-dark">Vanessa Tucker</div>
                                        <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                                        <div class="text-muted small mt-1">15m ago</div>
                                    </div>
                                </div>
                            </a> 
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <img src="{{ asset('assets/img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="William Harris">                                        
                                    </div>
                                    <div class="col-10 pl-2">
                                        <div class="text-dark">William Harris</div>
                                        <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                                        <div class="text-muted small mt-1">2h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <img src="{{ asset('assets/img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                    </div>
                                    <div class="col-10 pl-2">
                                        <div class="text-dark">Christina Mason</div>
                                        <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                                        <div class="text-muted small mt-1">4h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-2">
                                        <img src="{{ asset('assets/img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">                                        
                                    </div>
                                    <div class="col-10 pl-2">
                                        <div class="text-dark">Sharon Lessman</div>
                                        <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                                        <div class="text-muted small mt-1">5h ago</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Show all messages</a>
                        </div>
                    </div>
                </li>
                <!--
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
        <i class="align-middle" data-feather="settings"></i>
      </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
        <img src="{{ asset('assets/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded mr-1" alt="Charles Hall" /> 
        <span class="text-dark">Charles Hall</span>
      </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1" data-feather="settings"></i> Settings & Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
                -->
            </ul>
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
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">국가별 감염자 통계</h5>
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
            </div>

            <div class="row">
                <div class="col-md-12 d-flex">
                    <div class="w-100">
                        <div class="row" id="tbl_world_stat"></div>
                    </div>
                </div>  
                <div class="col-md-12 d-flex">
                    <div class="w-100">       
                        <div class="col-sm-12">
                            <div class="card">                            
                                <button type="button" class="btn btn-primary" id="btn_more_world">더보기</button>
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
                        name: "미국 (" + numberWithCommas(jsonNa[0].natDefCnt) + ")" 
                    },
                    {
                        latLng: [23.52794008190942, 79.47201030764019],
                        name: "인도 (" + numberWithCommas(jsonNa[1].natDefCnt) + ")" 
                    },
                    {
                        latLng: [-8.54358700909542, -53.97329128438263],
                        name: "브라질 (" + numberWithCommas(jsonNa[2].natDefCnt) + ")" 
                    },
                    {
                        latLng: [62.79521536150938, 92.28085411315915],
                        name: "러시아 (" + numberWithCommas(jsonNa[3].natDefCnt) + ")" 
                    },
                    {
                        latLng: [46.74028142081584, 2.6324183628787026],
                        name: "프랑스 (" + numberWithCommas(jsonNa[4].natDefCnt) + ")" 
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
        
        html = "";
        for(var i=0;i<jsonNa.length;i++){            
            if(i < 32){
                html += "<div class=\"col-sm-3\" id=naBlock_" + i + "><div class=\"card\">";
            }else{
                html += "<div class=\"col-sm-3 naBlock\" style=\"display: none;\" id=naBlock_" + i + "><div class=\"card\">";
            }
                html += "<div class=\"card-body\">";
                html += "<div class=\"mb-1\">";
                html += "<span class=\"text-secondary\">" + jsonNa[i].nationNm + "</span>";
                html += "<div style=\"display: inline-block;width: 45%;text-align: right;\"><span class=\"badge badge-danger\">" + numberWithCommas(jsonNa[i].natDefCnt) + "</span></div>";
                html += "</div>";                
                html += "</div>";
                html += "</div></div>";
        }

        //console.log(html);

        //if(!html){
        $("#tbl_world_stat").html(html);
        //}

        for(var i=0;i<5;i++){
            wLabel.push(jsonNa[i].nationNm);
            wCnt.push(jsonNa[i].natDefCnt);            
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