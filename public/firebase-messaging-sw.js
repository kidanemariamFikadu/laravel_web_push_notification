/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts("https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js"
);

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
    apiKey: "AIzaSyCkad5QIt10eoU0EpUlCzE_pGu83eJL-U8",
    authDomain: "test-messaging-7d637.firebaseapp.com",
    databaseURL: "https://test-messaging-7d637-default-rtdb.firebaseio.com",
    projectId: "test-messaging-7d637",
    storageBucket: "test-messaging-7d637.appspot.com",
    messagingSenderId: "380151950596",
    appId: "1:380151950596:web:d2ee7c5d7fb8dd14e27451",
    measurementId: "G-2Q0HDC8VS5",
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    );
});
