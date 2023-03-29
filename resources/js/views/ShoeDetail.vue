<template>
    <div class="container m-auto">
        <p class="text-2xl mt-5">Detail Product</p>
        <div class="container m-auto mt-5 flex justify-between items-center flex-wrap">
            <div class="w-72 flex flex-col items-center">
                <img v-bind:src="`/images/${shoes.image}`">
                <p class="font-bold text-2xl">{{shoes.name}}</p>
                <p class="text-red-400 text-blue-500">Price: {{shoes.price}}</p>
                <p class="text-red-400">Quantity: {{shoes.quantity}}</p>
                <router-link :to="{ name: 'shoe-edit', params: {id}}">Edit</router-link>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            shoes: [],
            id: this.$route.params.id
        }
    },

    methods: {
        async listShoe() {
            // await axios
                // .get('http://hello_world.local/api/shoe/1')
                // .then(response => {
                //     this.shoe = response.data
                //     console.log(this.shoe)
                // })

            const api = "http://hello_world.local/api/shoe/"
            const idShoe = this.$route.params.id.toString()
            const fullApi = api + idShoe
            const res = await fetch(fullApi);
            const finalRes = await res.json();
            this.shoes = finalRes;
        }
    },

    mounted() {
        this.listShoe()
    }
}
</script>
