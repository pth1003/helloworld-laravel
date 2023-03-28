<template>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <title>Music Template</title>

        <!-- CSS -->
    </head>

    <body class="bg-gray-100 font-sans pb-24">
    <!-- Header -->
    <!-- Main Content -->
    <section class="container mx-auto mt-6">
        <div class="md:grid md:grid-cols-3 md:gap-4">
            <div class="col-span-1">
                <app-upload/>
            </div>
            <div class="col-span-2">
                <div
                    class="bg-white rounded border border-gray-200 relative flex flex-col"
                >
                    <div class="px-6 pt-6 pb-5 font-bold border-b border-gray-200">
                        <span class="card-title">My Songs</span>
                        <i
                            class="fa fa-compact-disc float-right text-green-400 text-2xl"
                        ></i>
                    </div>
                    <div class="p-6">
                        <!-- Composition Items -->
                        <div class="border border-gray-200 p-3 mb-4 rounded" v-for="song in songs" :key="song.modified_name">
                            <div>
                                <h4 class="inline-block text-2xl font-bold">{{ song.modified_name }}</h4>
                                <button
                                    class="ml-1 py-1 px-2 text-sm rounded text-white bg-red-600 float-right"
                                >
                                    <i class="fa fa-times"></i>
                                </button>
                                <button
                                    class="ml-1 py-1 px-2 text-sm rounded text-white bg-blue-600 float-right"
                                >
                                    <i class="fa fa-pencil-alt"></i>
                                </button>
                            </div>
                            <div>
<!--                                <form>-->
<!--                                    <div class="mb-3">-->
<!--                                        <label class="inline-block mb-2">Song Title</label>-->
<!--                                        <input-->
<!--                                            type="text"-->
<!--                                            class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"-->
<!--                                            placeholder="Enter Song Title"-->
<!--                                        />-->
<!--                                    </div>-->
<!--                                    <div class="mb-3">-->
<!--                                        <label class="inline-block mb-2">Genre</label>-->
<!--                                        <input-->
<!--                                            type="text"-->
<!--                                            class="block w-full py-1.5 px-3 text-gray-800 border border-gray-300 transition duration-500 focus:outline-none focus:border-black rounded"-->
<!--                                            placeholder="Enter Genre"-->
<!--                                        />-->
<!--                                    </div>-->
<!--                                    <button-->
<!--                                        type="submit"-->
<!--                                        class="py-1.5 px-3 rounded text-white bg-green-600"-->
<!--                                    >-->
<!--                                        Submit-->
<!--                                    </button>-->
<!--                                    <button-->
<!--                                        type="button"-->
<!--                                        class="py-1.5 px-3 rounded text-white bg-gray-600"-->
<!--                                    >-->
<!--                                        Go Back-->
<!--                                    </button>-->
<!--                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Player -->
    <div class="fixed bottom-0 left-0 bg-white px-4 py-2 w-full">
        <!-- Track Info -->
        <div class="text-center">
            <span class="song-title font-bold">Song Title</span> by
            <span class="song-artist">Artist</span>
        </div>
        <div class="flex flex-nowrap gap-4 items-center">
            <!-- Play/Pause Button -->
            <button type="button">
                <i class="fa fa-play text-gray-500 text-xl"></i>
            </button>
            <!-- Current Position -->
            <div class="player-currenttime">00:00</div>
            <!-- Scrub Container  -->
            <div class="w-full h-2 rounded bg-gray-200 relative cursor-pointer">
                <!-- Player Ball -->
                <span
                    class="absolute -top-2.5 -ml-2.5 text-gray-800 text-lg"
                    style="left: 50%"
                >
            <i class="fas fa-circle"></i>
          </span>
                <!-- Player Progress Bar-->
                <span
                    class="block h-2 rounded bg-gradient-to-r from-green-500 to-green-400"
                    style="width: 50%"
                ></span>
            </div>
            <!-- Duration -->
            <div class="player-duration">03:06</div>
        </div>
    </div>
    </body>
    </html>
</template>

<script>
import AppUpload from "../components/Upload.vue";
import {songCollection} from "../includes/firebase";

console.log('songCollection', songCollection)
export default {
    components: {
        AppUpload
    },

    data() {
       return {
           songs: []
       }
    },

    async created() {
        const snapshot = await songCollection.get()
        snapshot.forEach((document) => {
            const song = {
                ...document.data(),
                docID: document.i
            }

            this.songs.push(song)
        })

    }
}
</script>

