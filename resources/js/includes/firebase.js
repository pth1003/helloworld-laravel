import firebase from "firebase/app";
import 'firebase/firestore'
import 'firebase/storage'

const firebaseConfig = {
    apiKey: "AIzaSyBPpg1_wwh3feHegs6peUahNESv4xs8HTU",
    authDomain: "music-b3c2b.firebaseapp.com",
    projectId: "music-b3c2b",
    storageBucket: "music-b3c2b.appspot.com",
    appId: "1:93191986159:web:e89325cd0ddb5d0fbb741a"
};

firebase.initializeApp(firebaseConfig)

const db = firebase.firestore()
const storage = firebase.storage()
const songCollection =  db.collection('songs')
export { db , storage, songCollection}
