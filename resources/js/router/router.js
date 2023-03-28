import { createRouter, createWebHistory } from "vue-router";
import Manage from "../views/Manage.vue";
import DetailUser from "../views/DetailUser.vue";
import ListUser from "../components/ListUser.vue";
const routes = [
    {
        path: '/manage', name: 'manage', component: Manage
    },
    {
        path: '/detail-user', name: 'detail-user', component: DetailUser
    },
    {
        path: '/list-user', name: 'list-user', component: ListUser
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
