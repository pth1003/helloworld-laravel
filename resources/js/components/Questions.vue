<template>
<!--    <transition-->
<!--        enter-active-class="animate__animated animate__fadeIn"-->
<!--        leave-active-class="animate__animated animate__fadeOut">-->
<!--        <h1 v-if="test === true">HIIII</h1>-->
<!--    </transition>-->
<!--    <button @click="test = !test">Clcik</button>-->
        <div class="ctr">
            <div class="questions-ctr">
                <div class="progress">
                    <div class="bar" :style="{width: `${questionsAnsweered / questions.length * 100}%`}"></div>
                    <div class="status">{{questionsAnsweered}} out of {{totalQuestion}} questions answered</div>
                </div>
                <div class="single-question"
                     v-for="(question, qi) in questions"
                     :key="question.q"
                     v-show="questionsAnsweered === qi"
                >
                    <div class="question">{{ question.q }}</div>
                    <div class="answers">
                        <div class="answer"
                             v-for="answer in question.answers" key="answer.text"
                             @click.prevent="selectAnswer(answer.is_correct)"
                        >
                            {{ answer.text }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
        }
    },

    props: [
        'questions',
        'questionsAnsweered',
        'totalQuestion'
    ],

    emits: ["check-answer"],

    methods: {
        selectAnswer(is_correct) {
            this.$emit('check-answer', is_correct)
        },
    },
}
</script>
