<template>
<!--        <a href="#/">Questions</a> |-->
<!--        <a href="#/contact">Contact</a>-->
<!--        <component :is="currentView" />-->
    <div class="ctr">
            <questions v-if="questionsAnsweered < questions.length" :questions="questions"
                       :questionsAnsweered="questionsAnsweered"
                       @check-answer="checkAnswer"
                       :totalQuestion="questions.length"
            />
            <results v-else :results="results" :totalCorrect="totalCorrect"
                     :totalQuestion="questions.length"
                     @reset-question="reset"
            >
            </results>
    </div>
</template>


<script>
import Questions from "./components/Questions.vue";
import Contact from "./components/Contact.vue";
import Results from "./components/Results.vue";

const routes = {
    '/': Contact,
    '/contact': Questions,

}
export default {
    components: {Results, Questions, Contact},

    data() {
        return {
            questionsAnsweered: 0,
            totalCorrect: 0,
            questions: [
                {
                    q: 'What is 2 + 2?',
                    answers: [
                        {
                            text: '4',
                            is_correct: true
                        },
                        {
                            text: '3',
                            is_correct: false
                        },
                        {
                            text: 'Fish',
                            is_correct: false
                        },
                        {
                            text: '5',
                            is_correct: false
                        }
                    ]
                },
                {
                    q: 'How many letters are in the word "Banana"?',
                    answers: [
                        {
                            text: '5',
                            is_correct: false
                        },
                        {
                            text: '7',
                            is_correct: false
                        },
                        {
                            text: '6',
                            is_correct: true
                        },
                        {
                            text: '12',
                            is_correct: false
                        }
                    ]
                },
                {
                    q: 'Find the missing letter: C_ke',
                    answers: [
                        {
                            text: 'e',
                            is_correct: false
                        },
                        {
                            text: 'a',
                            is_correct: true
                        },
                        {
                            text: 'i',
                            is_correct: false
                        }
                    ]
                },
                {
                    q: '5+5 = ?',
                    answers: [
                        {
                            text: '11',
                            is_correct: false
                        },
                        {
                            text: '10',
                            is_correct: true
                        },
                        {
                            text: '12',
                            is_correct: false
                        }
                    ]
                },
            ],
            results: [
                {
                    min: 0,
                    max: 2,
                    title: "Try again!",
                    desc: "Do a little more studying and you may succeed!"
                },
                {
                    min: 3,
                    max: 3,
                    title: "Wow, you're a genius!",
                    desc: "Studying has definitely paid off for you!"
                }
            ],
            currentPath: window.location.hash,
        }
    },

    methods: {
        checkAnswer(is_correct) {
            if (is_correct) {
                this.totalCorrect++
            }

            this.questionsAnsweered++
        },

        reset() {
            this.questionsAnsweered = 0
            this.totalCorrect = 0
        }
    },


    computed: {
        currentView() {
            return routes[this.currentPath.slice(1) || '/']
        },
    },

    mounted() {
        window.addEventListener('hashchange', () => {
            this.currentPath = window.location.hash
        })
    }
}

</script>

<style>
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

