<template>
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-stone-100 flex justify-center items-center flex-col">
        <p class="text-3xl text-blue-600">LOGIN</p>
        <form class="w-5/12">
            <!-- Email -->
            <div class="mb-3">
                <label class="inline-block mb-2">Email</label>
                <input
                    type="email"
                    class=" w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                    placeholder="Enter Email"
                />
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label class="inline-block mb-2">Password</label>
                <input
                    type="password"
                    class=" w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                    placeholder="Password"
                />
            </div>
            <button
                type="submit"
                class=" w-full bg-purple-600 text-white py-1.5 px-3 rounded transition hover:bg-purple-700"
            >
                Submit
            </button>
            <button
                @click.prevent="openRegister"
                class=" w-full bg-green-600 text-white py-1.5 px-3 rounded transition hover:bg-green-700 mt-2"
            >
                Register
            </button>

            <button
                @click="back"
                class="bg-red-500 text-white py-1.5 px-3 rounded transition hover:bg-red-700 mt-2"
            >
                BACK
            </button>
        </form>
    </div>
</template>
<script>
export default {
    emits: ['openFormRegister', 'back'],
    methods: {
        openRegister() {
            this.$emit('openFormRegister')
        },

        back() {
            this.$emit('closeForm')
        }
    }
}
</script>
