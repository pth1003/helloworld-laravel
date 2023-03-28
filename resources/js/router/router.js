import { createRouter, createWebHistory } from "vue-router";
import ShoeList from "../views/ShoeList.vue";
import ShoeDetail from "../views/ShoeDetail.vue";
const routes = [
    {
        path: '/shoe-list',
        name:'shoe-list',
        component: ShoeList
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
