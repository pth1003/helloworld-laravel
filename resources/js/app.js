import './bootstrap';
import { createApp } from 'vue';
import 'animate.css';
import '../sass/app.scss'

import router from "./router/router";

import App from './App.vue';

const app = createApp(App);

app.use(router)
app.component('app', App);
app.mount('#app');
