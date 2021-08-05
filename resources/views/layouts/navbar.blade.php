<ul class="navbar-nav navbar-align">
    @guest
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
            <form action="" method="POST">
            <div class="list-group">
                <a class="list-group-item">
                    <div class="row no-gutters align-items-center">
                        <div class="col-3">
                            <span>아이디</span>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </a>
                <a class="list-group-item">
                    <div class="row no-gutters align-items-center">
                        <div class="col-3">
                            <span>비밀번호</span>
                        </div>
                        <div class="col-9">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </a>    
                <a class="list-group-item">
                    <div class="row no-gutters align-items-center">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary">로그인</button>
                            </div>
                        </div>
                    </div>
                </a>                      
            </div>
            </form>
            <div class="dropdown-menu-footer">
                <a href="" class="text-muted">아이디&비빌번호 찾기</a>
                /
                <a href="" class="text-muted">회원가입</a>
            </div>
        </div>
    </li>
    @else

    @endguest


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
</ul>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>