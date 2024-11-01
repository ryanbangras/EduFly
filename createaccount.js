import {} from "https://www.gstatic.com/firebasejs/8.8.1/firebase-app.js"
  
import {} from "https://www.gstatic.com/firebasejs/8.8.1/firebase-database.js"
    
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app.js'
// TODO: Replace the following with your app's Firebase project configuration
    const firebaseConfig = {
        apiKey: FIREBASEDURI,
        authDomain: "edufly-61bfe.firebaseapp.com",
        projectId: "edufly-61bfe",
        storageBucket: "edufly-61bfe.appspot.com",
        messagingSenderId: "467191151194",
        appId: "1:467191151194:web:cac30fd47ebff5a7233663",
        measurementId: "G-NQN411353D"
    };
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    import { getAuth, createUserWithEmailAndPassword } from 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth.js'
        // Initialize Firebase Authentication and get a reference to the service
        const auth = getAuth(app);

		document.getElementById('signup-btn').addEventListener('click', function() {
			// Get the form data
			const email = document.getElementById('email').value;
			const password = document.getElementById('password').value;
			
			// Simple validation (add more complex checks as needed)
			if (email === '' || password === '') {
				alert('Please fill in both fields');
			} else {
                createUserWithEmailAndPassword(auth, email, password)
                .then((userCredential) => {
                    // Signed up 
                    const user = userCredential.user;
                    window.location.href= 'login_teacher.html';
                    // ...
                })
                .catch((error) => {
                    const errorCode = error.code;
                    const errorMessage = error.message + "";
                    alert(errorCode);
                    // ..
                });
			}
		});