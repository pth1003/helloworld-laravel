import { createRouter, createWebHistory } from "vue-router";
import Manage from "../views/Manage.vue";
import Home from "../views/Home.vue";
const routes = [
    {
        path: '/', name: 'home', component: Home
    },
    {
        path: '/manage', name: 'manage', component: Manage
    },
    {
        path: '/music-pinia', redirect: {name: 'home'}
    },
    {
        path: '/:catchAll(.*)*', redirect: {name: 'home'}
    },
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes,
    linkExactActiveClass: 'text-yellow-500'
})

export default router
