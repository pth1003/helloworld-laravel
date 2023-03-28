<template>
    <h1 class="text-600">Danh sách user</h1>
    <ul>
        <li v-for="data in dataCustomer" :key="data.id">
            {{data.fullname}}
        </li>
    </ul>
    <router-link :to="{name: 'detail-user'}">Detail</router-link>
</template>

<script>
import axios from "axios";
import DetailUser from "../views/DetailUser.vue";
export default {

    components: {
        DetailUser
    },

    data() {
        return {
            dataCustomer: []
        }
    },

    methods: {
        async getCustomer() {
            const res = await fetch("http://hello_world.local/api/customer");
            const finalRes = await res.json();
            this.dataCustomer = finalRes;
           // await axios
           //      .get('https://jsonplaceholder.typicode.com/posts')
           //      .then(response => {
           //          this.dataCustomer = response.data
           //      })
            console.log(this.dataCustomer)
        }
    },

    mounted() {
        this.getCustomer()
    }
}
</script>
