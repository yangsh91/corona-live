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
            <script src="{{ asset('assets/js/main.js') }}"></script>
            <script src="{{ asset('assets/js/service-worker.js') }}"></script>
            <script type="text/javascript">
                
                $(function(){

                    $("#btn_login").click(function(){

                        console.log("~~~~~~");

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
                    
                })
            
            </script>
        </div>                        
    </body>
</html>
