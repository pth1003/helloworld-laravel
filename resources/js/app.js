import './bootstrap';
import { createApp } from 'vue';
import 'animate.css';
import '../sass/app.scss'
import App from './App.vue';
import {createPinia} from "pinia";

const app = createApp(App);

app.use(createPinia())
// app.use(router)

app.component('app', App);
app.mount('#app');
