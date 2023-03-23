<template>
    <div class="ctr">
        <div class="result">
            <div class="title">SỐ câu trả lời chính xác của bạn là: {{totalCorrect}} / {{totalQuestion}}</div>
            <div class="title">Số điểm của bạn là:{{ points }} </div>
<!--            <div class="desc">-->
<!--                Enter a short description here about the result.-->
<!--            </div>-->
        </div>
        <h2 v-if="points === 10">Bạn rất xuất sắc</h2>
        <h2 v-else-if="points >=8 && points <10 ">Bạn rất giỏi</h2>
        <h2 v-else-if="points >=5 && points <8 ">Bạn khá </h2>
        <h2 v-else>Bạn ngu </h2>
        <button type="button" class="reset-btn" @click="reset">Reset</button>
    </div>
</template>

<script>

export default {
    props: [
        'totalCorrect',
        'results',
        'totalQuestion'
    ],

    computed: {
        points() {

            return (10 / this.totalQuestion) * this.totalCorrect
        }
    },
    emits: ['reset-question'],
    methods: {
        reset() {
            this.$emit('reset-question')
        }
    }
}
</script>
