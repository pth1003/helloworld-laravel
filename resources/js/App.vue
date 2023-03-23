<template>
    <!--    <a href="#/">Quiz</a> |-->
    <!--    <a href="#/contact">Contact</a>-->
    <!--    <component :is="currentView" />-->
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
import questions from "./components/Questions.vue";

const routes = {
    '/': Questions,
    '/contact': Contact,

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


