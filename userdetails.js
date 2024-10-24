import {} from "https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"
  
import {} from "https://www.gstatic.com/firebasejs/8.8.1/firebase-database.js"

import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js'
    // TODO: Replace the following with your app's Firebase project configuration
    const firebaseConfig = {
        //apiKey: 
        authDomain: "edufly-61bfe.firebaseapp.com",
        projectId: "edufly-61bfe",
        storageBucket: "edufly-61bfe.appspot.com",
        messagingSenderId: "467191151194",
        appId: "1:467191151194:web:cac30fd47ebff5a7233663",
        measurementId: "G-NQN411353D"
    };
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    // Add Firebase products that you want to use
    import { getAuth, onAuthStateChanged  } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth.js'
    // Initialize Firebase Authentication and get a reference to the service
    const auth = getAuth();
    onAuthStateChanged(auth, (user) => {
    if (user) {
        // User is signed in, see docs for a list of available properties
        // https://firebase.google.com/docs/reference/js/auth.user
        const email = user.email;
        console.log(email);
        const displayName = email.split("@")[0]
        document.getElementById("drop").innerText = displayName;
        // ...
    } else {
        // User is signed out
        // ...
    }
    });