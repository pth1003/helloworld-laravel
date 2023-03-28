import './bootstrap';
import { createApp } from 'vue';
import 'animate.css';
// import '../sass/app.scss'
import VeeValidatePlugin from './includes/validation'
import App from './App.vue';
import {createPinia} from "pinia";
import router from "./router/router";

const app = createApp(App);

app.use(createPinia())
app.use(router)

app.use(VeeValidatePlugin)

app.component('app', App);
app.mount('#app');
