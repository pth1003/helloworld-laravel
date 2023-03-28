<template>
    <header id="header" class="bg-gray-700">
        <nav class="container mx-auto flex justify-start items-center px-5 px-4">
            <!-- App Name -->
            <a class="text-white font-bold uppercase text-2xl mr-4" href="#">Music</a>
            <div class="flex flex-grow items-center">
                <!-- Primary Navigation -->
                <ul class="flex flex-row mt-1">
                    <!-- Navigation Links -->
                    <li>
                        <router-link class="px-2 text-white" to="/">Home</router-link>
                    </li>
                    <li>
                        <a class="px-2 text-white" href="#" @click.prevent="toggleAuthModel">Login / Register</a>
                    </li>
                    <li>
                        <router-link class="px-2 text-white" :to="{name: 'manage'}">Manage</router-link>
<!--                        <router-view></router-view>-->
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
import {mapStores , mapState, mapWritableState} from "pinia";
import useModelStore from "./stores/modal"

export default {
    computed: {
        ...mapStores(useModelStore)
    },

    methods: {
        toggleAuthModel() {
            this.modalStore.isOpen = !this.modalStore.isOpen
        }
    }
}
</script>
