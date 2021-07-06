@extends('layouts.app')

@section('content')

<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">CLFE</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="index.html">
                <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">국내</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">해외</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-settings.html">
                <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-invoice.html">
                <i class="align-middle" data-feather="credit-card"></i> <span class="align-middle">Invoice</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-blank.html">
                <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>
            
        </ul>
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
                    <h3><strong>Analytics</strong> Dashboard</h3>
                </div>

                <div class="col-auto ml-auto text-right mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a href="#">AdminKit</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총확진자수</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->decideCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $data->incrCnt }} </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총완치자</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->clearCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $data->incrClearCnt }} </span>
                                            <span class="text-muted">Since last week</span>
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
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $data->incrDeathCnt }} </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">총검사자</h5>
                                        <h1 class="display-5 mt-1 mb-3">{{ number_format($data->item[0]->accExamCnt) }}</h1>
                                        <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> {{ $data->incrExamCnt }} </span>
                                            <span class="text-muted">Since last week</span>
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
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Calendar</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="datetimepicker-dashboard"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-8 col-xxl-9 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">지역별 감염자 통계</h5>
                        </div>
                        <table class="table table-hover my-0" id="tbl_region_cnt" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>지역</th>
                                    <th class="d-none d-xl-table-cell">확진자</th>
                                    <th class="d-none d-xl-table-cell">사망자</th>
                                    <th>완치자</th>
                                    <th class="d-none d-md-table-cell">전일대비</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                <tr>
                                    <td>Project Apollo</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                </tr>
                                <tr>
                                    <td>Project Fireball</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                                <tr>
                                    <td>Project Hades</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Sharon Lessman</td>
                                </tr>
                                <tr>
                                    <td>Project Nitro</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-warning">In progress</span></td>
                                    <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                </tr>
                                <tr>
                                    <td>Project Phoenix</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                                <tr>
                                    <td>Project X</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Sharon Lessman</td>
                                </tr>
                                <tr>
                                    <td>Project Romeo</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-success">Done</span></td>
                                    <td class="d-none d-md-table-cell">Christina Mason</td>
                                </tr>
                                <tr>
                                    <td>Project Wombat</td>
                                    <td class="d-none d-xl-table-cell">01/01/2020</td>
                                    <td class="d-none d-xl-table-cell">31/06/2020</td>
                                    <td><span class="badge badge-warning">In progress</span></td>
                                    <td class="d-none d-md-table-cell">William Harris</td>
                                </tr>
                            -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-3 d-flex">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Monthly Sales</h5>
                        </div>
                        <div class="card-body d-flex w-100">
                            <div class="align-self-center chart chart-lg">
                                <canvas id="chartjs-dashboard-bar"></canvas>
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
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
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
                '<table><tbody>' +
                '<tr><td>0-19세</td><td class="text-end">' + age.ageChildren+ '</td></tr>' +
                '<tr><td>20-39세</td><td class="text-end">' + age.ageGolden + '</td></tr>' +
                '<tr><td>40-59세</td><td class="text-end">' + age.ageAdult + '</td></tr>' +
                '<tr><td>60세 이상</td><td class="text-end">' + age.ageSilver + '</td></tr>' +
                '</table></tbody>'
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
                            window.theme.primary,
                            window.theme.primary,
                            window.theme.primary,
                            window.theme.primary,
                            window.theme.primary,
                            window.theme.primary,
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
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
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
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
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
        var region = @json($region);
        console.log(region);

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
                    name: "서울 (" + region.item[17].defCnt + ")" 
                    }
                    ,{
                    latLng: [37.448570, 126.705526],
                    name: "인천 (" + region.item[14].defCnt + ")" 
                    }
                    ,{
                    latLng: [37.329276, 127.383905],
                    name: "경기 (" + region.item[9].defCnt + ")" 
                    }
                    ,{
                    latLng: [36.336884, 127.387824],
                    name: "대전 (" + region.item[12].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.820656906917186, 128.58178659163752],
                    name: "대구 (" + region.item[15].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.142493511440335, 126.83434103761101],
                    name: "광주 (" + region.item[13].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.530716207011956, 129.27332887472036],
                    name: "울산 (" + region.item[11].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.14857382293423, 129.07999447299827],
                    name: "부산 (" + region.item[16].defCnt + ")" 
                    }                    
                    ,{
                    latLng: [36.519099870678744, 127.2691745879341],
                    name: "세종 (" + region.item[10].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.814752337155156, 127.12515640069495],
                    name: "전북 (" + region.item[5].defCnt + ")" 
                    }
                    ,{
                    latLng: [34.740666956058874, 126.9423513051883],
                    name: "전남 (" + region.item[4].defCnt + ")" 
                    }
                    ,{
                    latLng: [36.43925740840318, 128.64485292232828],
                    name: "경북 (" + region.item[3].defCnt + ")" 
                    }
                    ,{
                    latLng: [35.403923741437396, 128.6698237897298],
                    name: "경남 (" + region.item[2].defCnt + ")" 
                    }
                    ,{
                    latLng: [36.875949551495616, 127.86238911046159],
                    name: "충북 (" + region.item[7].defCnt + ")" 
                    }
                    ,{
                    latLng: [36.47443553397595, 126.80845426001015],
                    name: "충남 (" + region.item[6].defCnt + ")" 
                    }
                    ,{
                    latLng: [37.78137174624893, 128.4001384530638],
                    name: "강원 (" + region.item[16].defCnt + ")" 
                    }
                    ,{
                    latLng: [33.33356461970605, 126.54899111552427],
                    name: "제주 (" + region.item[16].defCnt + ")" 
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
                html += "<td>" + region.item[i].defCnt + "</td>";
                html += "<td>" + region.item[i].deathCnt + "</td>";
                html += "<td><span class=\"badge badge-success\"> +" + region.item[i].isolClearCnt + "</span></td>";
                html += "<td><span class=\"badge badge-danger\"> +" + region.item[i].incDec + "</span></td>";
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
			$('#datetimepicker-dashboard').datetimepicker({
				inline: true,
				sideBySide: false,
                days: ['일', '월','화','수','목','금','토'],
                daysShort: ['일', '월','화','수','목','금','토'],
                daysMin: ['일', '월','화','수','목','금','토'],
                months: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
                monthsShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],                
				format: 'L',
                maxDate: new Date()
			});

            //console.log("==== " + $("#datetimepicker-dashboard").data("datetimepicker").getDate() + " ====");
            //console.log(":::: " + $("#datetimepicker-dashboard").find("input").val() + " ::::");
            
		});
        
	</script>

@endsection