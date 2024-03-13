import firebase from 'firebase/app';
import 'firebase/firestore';

const firebaseConfig = {
    apiKey: "AIzaSyB6LLTqusifjOJzamCeiuz2giJgJyQxcHo",
    authDomain: "jeet-4028b.firebaseapp.com",
    projectId: "jeet-4028b",
    storageBucket: "jeet-4028b.appspot.com",
    messagingSenderId: "85060947763",
    appId: "1:85060947763:web:d2c8d76c38a3673ba03846",
    measurementId: "G-QV1Z6K5VYG"
  };
  firebase.initializeApp(firebaseConfig);
  export const db = firebase.firestore();
