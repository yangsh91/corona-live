import '@firebase/messaging';

const config = {
    apiKey: "AIzaSyCTugUWys8dpxLcnbh3kxr_2pnLfeHXgis",
    authDomain: "corona-live-fe.firebaseapp.com",
    projectId: "corona-live-fe",
    storageBucket: "corona-live-fe.appspot.com",
    messagingSenderId: "348888085242",
    appId: "1:348888085242:web:0548a4bdfc1de1bcb24f43",
    measurementId: "G-LB6MRH3TEB"
};

firebase.initializeApp(config);
const messaging = firebase.messaging()
messaging.usePublicVapidKey("Your Web push key");
Notification.requestPermission().then(function(permission) {
  if (permission === 'granted') {
    console.log('Notification permission granted.');
  } else {
    console.log('Unable to get permission to notify.');
  }
});