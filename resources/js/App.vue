<template>
    <body class="bg-gray-100 font-sans">
    <Header></Header>
    <router-view></router-view>

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

    <!-- Auth Modal -->
    <Auth></Auth>
    </body>
</template>

<script>
import Header from "./components/Header.vue";
import Auth from "./components/Auth.vue";
import axios from "axios";
export default {
    components: {Header, Auth},

    created() {
        axios.get('https://jsonplaceholder.typicode.com/todos/1')
            .then(response => {
                console.log('R:',response)
            })
    }
}
</script>


<style>
.bg-img {
   background-image: url("http://hello_world.local/images/header.png");
}

a {
    transition: all 0.15s ease;
}

/* text-yellow-500 */
a:hover {
    color: #f59e0b;
    text-decoration: none;
}

.text-orange {
    color: #f59e0b !important;
    fill: #f59e0b !important;
}

.card-header .fa.text-orange,
.card .card-header .fas.text-orange {
    color: #ff5e3a;
    fill: #ff5e3a;
}

.introduction-bg {
    animation: slide 50s linear infinite;
    will-change: background-position;
    z-index: -1;
}

#playlist li:first-child {
    padding-top: 25px;
}

.upload-dropbox.upload-dropbox-drag {
    color: #fff;
    background-color: #20d862;
    border-color: #20d862;
    border-style: solid;
}

input[type="file"] {
    margin-top: 20px;
}

.progress-bar {
    background-size: 1rem 1rem;
    background-image: linear-gradient(
        45deg,
        rgba(255, 255, 255, 0.15) 25%,
        transparent 25%,
        transparent 50%,
        rgba(255, 255, 255, 0.15) 50%,
        rgba(255, 255, 255, 0.15) 75%,
        transparent 75%,
        transparent
    );
    animation: progress-bar-stripes 1s linear infinite;
}

.music-bg {
    animation: slide 50s linear infinite;
    will-change: background-position;
}

@keyframes progress-bar-stripes {
    0% {
        background-position: 1rem 0;
    }
    100% {
        background-position: 0 0;
    }
}

@keyframes slide {
    0% {
        background-position: 0 0;
    }
    100% {
        background-position: -4000px 0;
    }
}

</style>
