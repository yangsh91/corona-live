<ul class="navbar-nav navbar-align">    
    @if(session()->has('user_id'))
        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                <div class="position-relative">
                    <span class="input-group-btn" style="font-size: 15px;">{{ session('email') }}</span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                <div class="dropdown-menu-header">
                    {{ session('user_id') }} 님 환영합니다.
                </div>
                <div class="list-group">
                    <a href="{{ route('auth.logout') }}" class="list-group-item">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-12" style="text-align: center;">
                                <div class="text-dark">로그아웃</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                <div class="position-relative">
                    <i class="align-middle" data-feather="bell"></i>
                    <span class="indicator">!</span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">                
                <div class="list-group">                    
                    @foreach($notiRows as $key => $noti)                        
                        <a class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-2">
                                    <i class="text-danger" data-feather="alert-circle"></i>
                                </div>
                                <div class="col-10">
                                    <div class="text-dark">{{ $noti['region'] }} {{ $noti['city'] }}</div>
                                    <div class="text-muted small mt-1">{{ $noti['msg'] }}</div>
                                    <!-- <div class="text-muted small mt-1">30m ago</div> -->
                                </div>
                            </div>
                        </a>                        
                        @if($key == 4)
                            @break
                        @endif
                    @endforeach                    
                </div>
                <div class="dropdown-menu-footer">
                    <a href="#tbl_region_notify" class="text-muted">더보기</a>
                </div>
            </div>
        </li>

    @else 
        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                <div class="position-relative">
                    <!-- <i class="align-middle" data-feather="bell"></i>
                    <span class="indicator">4</span> -->                
                    <span class="input-group-btn">로그인</span>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="alertsDropdown">
                <div class="dropdown-menu-header">
                    로그인
                </div>
                <form id="frm_login_act" action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="list-group">
                        <a class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-3">
                                    <span>아이디</span>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="user_id" id="user_id" value="{{ old('user_id') }}">
                                </div>
                            </div>
                        </a>
                        <a class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-3">
                                    <span>비밀번호</span>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="user_pass" id="user_pass">
                                </div>
                            </div>
                        </a>    
                        <a class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-md-12">
                                    <div class="d-grid gap-2">
                                    <button type="button" id="btn_login" class="btn btn-info btn-lg btn-primary" style="width: 100%;">로그인</button>
                                    </div>
                                </div>
                            </div>
                        </a>                      
                    </div>
                </form>
                <div class="dropdown-menu-footer">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">아이디&패스워드 찾기</button>
                    |                
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">회원가입</button>                
                </div>
            </div>
        </li>
    @endif                      
</ul>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <span class="modal-title">회원가입</span>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
        <form action="{{ route('auth.register') }}" method="post">

            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif

            @if(Session::get('fail'))
                {{ Session::get('fail') }}
            @endif

            @csrf
            <div class="form-group">                
                <label class="col-md-3 control-label">아이디</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="user_id" value="{{ old('user_id') }}">
                </div>
                <span class="text-danger">@error('user_id') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">                                
                <label class="col-md-3 control-label">비밀번호</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="user_pass">
                </div>
                <span class="text-danger">@error('user_pass') {{ $message }} @enderror</span>
                <label class="col-md-3 control-label">비밀번호확인</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="user_pass_chk">
                </div>
                <span class="text-danger">@error('user_pass_chk') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">                                
                <label class="col-md-3 control-label">이메일</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>
            <div class="form-group">                                                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-block btn-primary">회원가입</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
      </div>
    </div>

  </div>
</div>
  