<template>
    <div class="fixed top-0 left-0 right-0 bottom-0 bg-stone-100 flex justify-center items-center flex-col">
        <p class="text-3xl text-blue-600">REGISTER</p>
        <form class="w-5/12">
            <div class="mb-3">
                <label class="inline-block mb-2">Username</label>
                <input
                    type="text"
                    class=" w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                    placeholder="Enter Email"
                />
            </div>
            <div class="mb-3">
                <label class="inline-block mb-2">Fullname</label>
                <input
                    type="text"
                    class=" w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"
                    placeholder="Enter Email"
                />
            </div>
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
            <div class="mb-3">
                <label class="inline-block mb-2">Password Confirm</label>
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
                @click="closeModel"
                class=" w-full bg-green-600 text-white py-1.5 px-3 rounded transition hover:bg-green-700 mt-2"
            >
                BACK
            </button>
        </form>
    </div>
</template>
<script>
export default {
    emits: ['closeRegister'],
    methods: {
        closeModel() {
            this.$emit('closeRegister')
        }
    }
}
</script>
