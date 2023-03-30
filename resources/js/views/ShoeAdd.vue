<template>
    <p class="container m-auto text-3xl text-blue-400">ADD SHOE</p>
    <div class="container m-auto flex items-center">
        <form @submit.prevent="addShoe" enctype="multipart/form-data">
            <p>Name</p>
            <input class="bg-slate-200" type="text" name="name" v-model="shoe.name"/>

            <p>Price</p>
            <input class="bg-slate-200" type="text" name="price" v-model="shoe.price"/>

            <p>Quantity</p>
            <input class="bg-slate-200" type="text" name="quantity" v-model="shoe.quantity">

            <p>Image</p>
            <input class="bg-slate-200" type="file" name="image" ref="file" @change="uploadImg"/>
            <br>
            <button class="bg-green-300 rounded-md p-1">Add</button>
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
            shoe: {
                name: '',
                price: '',
                quantity: '',
                image: '',
            },
            message: '',
        }
    },

    methods: {
        uploadImg(e) {
            this.sendphoto = e.target.files[0];
            var image = this.sendphoto.name
            this.shoe.image = image

            // this.shoe.image = this.$refs.file.files[0]
            // console.log(this.shoe.image)
        },

        async addShoe() {
            // const formData = new FormData();
            // formData.append('image', this.shoe.image)
            await axios
                .post('http://hello_world.local/api/shoe/add', this.shoe)
                .then(response => {
                    this.message = response.data.message
                    setTimeout(() => {
                        this.$router.push({name: 'home'});
                    }, 1500)
                })
        },

    }
}
</script>
