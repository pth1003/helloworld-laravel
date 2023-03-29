<template>
    <div class="container m-auto mt-10 flex justify-between items-center flex-wrap">
        <div class="w-72 flex flex-col items-center" v-for="shoe in shoes" :key="shoe.id">
            <img v-bind:src="`/images/${shoe.image}`">
            <router-link :to="{ name: 'shoe-detail', params: {id: shoe.id}}">
                <p class="font-bold text-2xl">{{shoe.name}}</p>
            </router-link>
            <p class="text-blue-500 font-bold">Price: {{shoe.price}}</p>
            <p class="text-red-400">Quantity: {{shoe.quantity}}</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            shoes: []
        }
    },

    methods: {
        async listShoe() {
            await axios
                .get('http://hello_world.local/api/shoe')
                .then(response => {
                    this.shoes = response.data
                })

            // const res = await fetch("http://hello_world.local/api/shoe");
            // const finalRes = await res.json();
            // this.shoes = finalRes;
        }
    },

    mounted() {
        this.listShoe()
    }
}
</script>
