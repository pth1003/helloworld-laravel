import './bootstrap';
import { createApp } from 'vue';
import 'animate.css';
import '../sass/app.scss'
import App from './App.vue';

const app = createApp(App);

app.component('app', App);
app.mount('#app');
