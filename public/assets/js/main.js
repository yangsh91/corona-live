 // Life cycle: INSTALL
 self.addEventListener('install', event => {
    self.skipWaiting();
    log('INSTALL');
    caches.open(cacheName).then(cache => {
      log('Caching app shell');
      return cache.addAll(cacheList);
    })
  });


 // Your web app's Firebase configuration
 var firebaseConfig = {
    apiKey: "AIzaSyCSRMGDX6yNJ4aJchj5IkKzdMrFwu7J_QM",
    authDomain: "laravel-1d4c5.firebaseapp.com",
    projectId: "laravel-1d4c5",
    storageBucket: "laravel-1d4c5.appspot.com",
    messagingSenderId: "377639846073",
    appId: "1:377639846073:web:dc40616709d2ce833e5b68",
    measurementId: "G-EKF098E6M8"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
//firebase.analytics();
const messaging = firebase.messaging();
    messaging
.requestPermission()
.then(function () {
//MsgElem.innerHTML = "Notification permission granted." 
    // console.log("Notification permission granted.");
    // get the token in the form of promise
    return messaging.getToken()
})
.then(function(token) {
    // print the token on the HTML page     
    //console.log(token);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : '{{ route('saveToken') }}',
        data : {'token' : token},
        type : 'POST',
        dataType : 'json',
        success : function(result){

            console.log("===== " + result + " =====");

        }
    });



})
.catch(function (err) {
    console.log("Unable to get permission to notify.", err);
});

messaging.onMessage(function(payload) {
    console.log(payload);
    var notify;
    notify = new Notification(payload.notification.title,{
        body: payload.notification.body,
        icon: payload.notification.icon,
        tag: "Dummy"
    });
    console.log(payload.notification);
});

    //firebase.initializeApp(config);
var database = firebase.database().ref().child("/users/");

database.on('value', function(snapshot) {
    renderUI(snapshot.val());
});

// On child added to db
database.on('child_added', function(data) {
    console.log("Comming");
    if(Notification.permission!=='default'){
        var notify;
        
        notify= new Notification('CodeWife - '+data.val().username,{
            'body': data.val().message,
            'icon': 'bell.png',
            'tag': data.getKey()
        });
        notify.onclick = function(){
            alert(this.tag);
        }
    }else{
        alert('Please allow the notification first');
    }
});

self.addEventListener('notificationclick', function(event) {       
    event.notification.close();
}); 