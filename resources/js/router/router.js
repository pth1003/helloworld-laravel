import { createRouter, createWebHistory } from "vue-router";
import ShoeList from "../views/ShoeList.vue";
import ShoeDetail from "../views/ShoeDetail.vue";
import ShoeEdit from "../views/ShoeEdit.vue";
import Home from "../views/Home.vue";
const routes = [
    {
        path: '/shoe-list',
        name:'shoe-list',
        component: ShoeList
    },
    {
        path: '/',
        name:'home',
        component: Home
    },
    {
        path: '/shoe-detail/:id',
        name:'shoe-detail',
        component: ShoeDetail
    },
    {
        path: '/shoe-edit/:id/edit',
        name:'shoe-edit',
        component: ShoeEdit
    },
    {
        path: '/shoe',
        redirect: {name : 'home'}
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
