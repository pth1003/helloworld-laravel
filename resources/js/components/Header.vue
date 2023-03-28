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
                        <a class="px-2 text-white" href="#">Login</a>
                    </li>
                    <li>
                        <a class="px-2 text-white" href="#">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>
