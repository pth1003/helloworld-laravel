<template>
    <header id="header" class="bg-blue-400">
        <nav class="container mx-auto flex justify-start items-center py-5 px-4">
            <!-- App Name -->
            <a class="text-white font-bold uppercase text-2xl mr-4" href="#">SHOE</a>
            <div class="flex flex-grow items-center">
                <!-- Primary Navigation -->
                <ul class="flex flex-row mt-1">
                    <!-- Navigation Links -->
                    <li>
                        <router-link class="px-2 text-white" to="/">Home</router-link>
                    </li>
                    <li>
                        <a class="px-2 text-white" href="#">Product</a>
                    </li>
                    <li>
                        <button class="px-2 text-white" @click="isLogin=true">Login</button>
                    </li>
                    <li>
                        <button class="px-2 text-white" @click="isRegister=true">Register</button>
                    </li>
                    <li>
                        <router-link class="px-2 text-white" :to="{name: 'shoe-add'}">Add Shoe</router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <Login v-if="isLogin" @openFormRegister="isRegister=true" @closeForm = "isLogin=false"></Login>
    <Register v-if="isRegister" @closeRegister="isRegister=false"></Register>
</template>
<script>
import Login from "../views/Authentication/Login.vue";
import Register from "../views/Authentication/Register.vue";

export default {
    components: {
      Login,
      Register
    },
    data() {
        return {
            isLogin: false,
            isRegister: false
        }
    }
}
</script>
