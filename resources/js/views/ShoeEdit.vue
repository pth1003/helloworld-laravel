<template>
    <p class="container m-auto">Edit</p>
    <div class="container m-auto flex items-center">
        <form @submit.prevent="updateShoe" method="">
            <p>Name</p>
            <input class="bg-slate-200" type="text" name="name" v-model="shoes.name"/>

            <p>Price</p>
            <input class="bg-slate-200" type="text" name="price" v-model="shoes.price"/>

            <p>Quantity</p>
            <input class="bg-slate-200" type="text" name="quantiy" v-model="shoes.quantity">

            <p>Image</p>
            <input class="bg-slate-200" name="image" v-model="shoes.image"/>

            <button class="bg-green-300 rounded-md p-1">Edit</button>
        </form>
    </div>
    <div class="flex items-center justify-center fixed top-0 left-0 right-0 bottom-0" v-if="message != ''">
        <transition
            enter-active-class="animate__animated animate__backInDown"
            leave-active-class="animate__animated animate__bounceOut"
        >
            <div class="animate__animated animate__bounceIn bg-green-400 text-white py-2 px-10" v-if="message != ''"> {{ message }} </div>
        </transition>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            shoes: {},
            id: this.$route.params.id,
            message: ''
        }
    },

    created() {

    },

    methods: {
        async updateShoe() {
            try {
                await axios
                    .post(`http://hello_world.local/api/shoe/${this.$route.params.id}/edit`,this.shoes)
                    .then(response => {
                        this.message = response.data.message
                        setTimeout(() => {
                            this.$router.push({name: 'home'});
                        }, 1500)
                    })
            } catch (error) {
                console.log('ERROR: ',error)
            }
        },

        async editShoe() {
            await axios
                .get(`http://hello_world.local/api/shoe/${this.$route.params.id}/edit`)
                .then(response => {
                    this.shoes = response.data
                    console.log('Data shoe before edit: ', this.shoes)
                })
        }
    },

    mounted() {
        this.editShoe()
    }
}
</script>
