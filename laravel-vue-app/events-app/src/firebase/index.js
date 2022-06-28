// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from 'firebase/auth';
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDxcHO_wwaKzVzq_-ZKNF6tbwwsfeJ9JWM",
    authDomain: "vue-fire-auth-d7009.firebaseapp.com",
    projectId: "vue-fire-auth-d7009",
    storageBucket: "vue-fire-auth-d7009.appspot.com",
    messagingSenderId: "797662817360",
    appId: "1:797662817360:web:09082f78ecdaaa75d5b555",
    measurementId: "G-4X6J8WNEZW"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

const auth = getAuth(app);

export { auth };
