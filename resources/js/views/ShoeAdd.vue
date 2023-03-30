<template>
    <p class="container m-auto text-3xl text-blue-400">ADD SHOE</p>
    <div class="container m-auto flex items-center">
        <form @submit.prevent="addShoe" method="">
            <p>Name</p>
            <input class="bg-slate-200" type="text" name="name" v-model="shoe.name"/>

            <p>Price</p>
            <input class="bg-slate-200" type="text" name="price" v-model="shoe.price" />

            <p>Quantity</p>
            <input class="bg-slate-200" type="text" name="quantity" v-model="shoe.quantity">

            <p>Image</p>
            <input class="bg-slate-200" type="file" name="image" @change="chooseImg"/>
            <br>
            <button class="bg-green-300 rounded-md p-1">Add</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return  {
            shoe: {
                name: '',
                price: '',
                quantity: '',
                image: ''
            }
        }
    },

    methods: {
        chooseImg(e, ) {
            this.sendphoto = e.target.files[0];
            var image = this.sendphoto.name
            this.shoe.image = image
        },

        async addShoe() {
            await axios
                .post('http://hello_world.local/api/shoe/add', this.shoe)
                .then(res => {

                })
        },

    }
}
</script>
