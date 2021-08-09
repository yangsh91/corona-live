<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="shortcut icon" href="/assets/img/icon/coronavirus.png">
        <link rel="apple-touch-icon" href="/assets/img/icon/coronavirus.png">
        
        <title>Corona Live For Education</title>

        <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css">        
        <link rel="manifest" href="{{ asset('assets/js/manifest.json') }}">

        <!-- firebase integration started -->
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
        <!-- Firebase App is always required and must be first -->
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>

        <!-- Add additional services that you want to use -->
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-messaging.js"></script>
        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-functions.js"></script>

        <!-- firebase integration end -->

        <!-- Comment out (or don't include) services that you don't want to use -->
        <!-- <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-storage.js"></script> -->

        <script src="https://www.gstatic.com/firebasejs/5.5.9/firebase.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.8.0/firebase-analytics.js"></script>        
    </head>
    <body>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="wrapper">
            @yield('content')
            <script type="text/javascript">
                
                $(function(){

                    var pw_chk = '';
                    // 회원가입
                    $("#btn_join_act").click(function(){

                        if($("#user_id").val() == ""){
                            alert("아이디를 입력해 주세요.");
                            return;
                        }

                        if($("#user_pass").val() == ""){
                            alert("비밀번호를 입력해 주세요.");
                            return;
                        }

                        if($("#email").val() == ""){
                            alert("이메일을 입력해 주세요.");
                            return;
                        }

                        if($("#user_pass_chk").val() != ''){ pw_chk = true; }
                        if(pw_chk == ''){
                            alert("비밀번호 확인이 필요 합니다.");
                            return;
                        }
                        
                        if($("#user_pass").val() != $("#user_pass_chk").val()){
                            alert("비밀번호가 일치하지 않습니다.");
                            return;                            
                        }
                        
                        $("#frm_join_act").submit();
                        

                    });

                    // 로그인
                    $("#btn_login").click(function(){

                        if($("#user_id").val() == ""){
                            alert("아이디를 입력해 주세요.");
                            return;
                        }

                        if($("#user_pass").val() == ""){
                            alert("비밀번호를 입력해 주세요.");
                            return;
                        }

                        $("#frm_login_act").submit();

                    });

                    // 아이디 찾기
                    $("#btn_find_user_id").click(function(){

                        if($("#find_user_id").val() == ""){
                            alert("아이디를 입력해 주세요.");
                            return;
                        }


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({ 
                            url : "{{ route('auth.findUserId') }}",
                            type :'post',
                            dataType : 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "find_user_id": $("#find_user_id").val()
                            },
                            success : function(data){                                
                                alert(data.msg);
                            }                     
                        });

                    });

                    // 비밀번호 찾기
                    $("#btn_find_user_pass").click(function(){

                        console.log("?????");

                        var email = $("#find_user_mail").val();                        

                        if(email == ""){
                            alert("이메일을 입력해 주세요.");
                            return;
                        }

                        if(!email_check(email)){
                            alert('이메일 형식이 올바르지 않습니다.');
                            return;
                        }


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({ 
                            url : "{{ route('auth.findUserPass') }}",
                            type :'post',
                            dataType : 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "find_user_mail": $("#find_user_mail").val()
                            },
                            success : function(data){                                
                                alert(data.msg);
                            }                     
                        });



                    });

                    // 내정보 수정
                    $("#btn_info_save").click(function(){

                        var info_user_pass = $("#info_user_pass").val();
                        var email = $("#info_user_mail").val();

                        if(info_user_pass == ""){
                            alert("비밀번호를 입력해 주세요.");
                            return;
                        }

                        if(info_user_pass.length < 6){
                            alert("비밀번호는 6자리 이상 입력해 주세요.");
                            return;
                        }

                        if(email != ""){
                            if(!email_check(email)){
                                alert('이메일 형식이 올바르지 않습니다.');
                                return;
                            }
                        }


                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({ 
                            url : "{{ route('auth.saveUserInfo') }}",
                            type :'post',
                            dataType : 'json',
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "info_user_id" : $("#info_user_id").val(),
                                "info_user_pass" : info_user_pass,
                                "info_user_mail" : email
                            },
                            success : function(data){                                
                                
                                if(data.success == true){
                                    alert(data.msg);
                                    location.reload();
                                }else{
                                    alert(data.msg);
                                    return;
                                }
                            }                     
                        });
                        

                    });


                    function email_check( email ) { 
                        var regex=/([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/; 
                        return (email != '' && email != 'undefined' && regex.test(email)); 
                    }                   
                    
                });                                        
            </script>
            <script src="{{ asset('assets/js/main.js') }}"></script>
            <script src="{{ asset('assets/js/service-worker.js') }}"></script>
            
        </div>                        
    </body>
</html>
