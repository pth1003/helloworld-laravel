<template>
    <div class="container m-auto mt-10 flex justify-between items-center flex-wrap">
        <div class="w-72 flex flex-col items-center" v-for="shoe in shoes" :key="shoe.id">
            <img v-bind:src="`/images/${shoe.image}`">
            <router-link :to="{ name: 'shoe-detail', params: {id: shoe.id}}">
                <p class="font-bold text-2xl">{{ shoe.name }}</p>
            </router-link>
            <p class="text-blue-500 font-bold">Price: {{ shoe.price }}</p>
            <p class="text-red-400">Quantity: {{ shoe.quantity }}</p>
            <button class="bg-yellow-400 py-1 px-3" @click="confirmDel(shoe.id)">Del</button>
        </div>
        <div class="flex items-center justify-center fixed top-0 left-0 right-0 bottom-0" v-if="confirmDelete">
                <div class="flex items-center justify-center flex-col animate__animated animate__bounceIn bg-yellow-500 text-white py-2 px-10">
                        <p class="mb-1">Bạn có muốn xóa giày này không ?</p>
                        <div class="w-40 flex justify-between">
                            <button class="bg-red-400 py-1 px-3" @click="deleteShoe()">Có</button>
                            <button class="bg-blue-300 py-1 px-3" @click="confirmDelete=false">Không</button>
                        </div>
                </div>
        </div>
    </div>

    <div class="flex items-center justify-center fixed top-0 left-0 right-0 bottom-0" v-if="message != ''">
        <div class="animate__animated animate__bounceIn bg-green-400 text-white py-2 px-10">
            {{ message }}
        </div>
    </div>

</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            shoes: [],
            message: '',
            confirmDelete: false,
            idDel: ''
        }
    },

    methods: {
        confirmDel(id) {
            this.confirmDelete = true
            this.idDel = id
        },

        async listShoe() {
            await axios
                .get('http://hello_world.local/api/shoe')
                .then(response => {
                    this.shoes = response.data
                })

            // const res = await fetch("http://hello_world.local/api/shoe");
            // const finalRes = await res.json();
            // this.shoes = finalRes;
        },

        async deleteShoe() {
            await axios
                .get(`http://hello_world.local/api/shoe/${this.idDel}/del`)
                .then(response => {
                    this.message = response.data.message
                    setTimeout(() => {
                        this.$router.push({name: 'home'});
                    }, 1500)
                })
            this.confirmDelete = false
        }
    },

    mounted() {
        this.listShoe()
    }
}
</script>
