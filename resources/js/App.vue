<template>
    {{number}}
    <p>Number x 2: {{double}}</p>
    <button @click="inCreaseNum"> Click</button>
    <p>Name: {{user.name}}</p>

    <input type="text" v-model="pharse">
    <h3>Reverse: {{reversePharse}}</h3>
    <h3>Reverse: {{reversePharse1}}</h3>
    <alert :user="user"></alert>

    <button ref="btn">Ref Composition APi</button>
</template>

<script>
import {ref, reactive, onMounted} from 'vue'
import Alert from './components/Alert.vue'
import alert from "./components/Alert.vue";
import { useNumber } from "./hooks/useNumber";
import { usePharse } from "./hooks/pharse";

export default {
    components: {
      Alert
    },
    setup() {

        const btn = ref(null)

        onMounted(() => {
            btn.value.addEventListener('click', () => {
                console.log('click ')
            })
        })

        const user = reactive({
            name: 'John',
            ang: 20
        })

        setTimeout(() => {
            user.name = 'Mary'
        }, 3000)

        //hook pharse
        const {pharse, reversePharse1, reversePharse} = usePharse()

        //hooks number
        const { double, inCreaseNum, number} = useNumber()

        return {
            number,
            inCreaseNum,
            user,
            pharse,
            reversePharse,
            reversePharse1,
            double,
            btn
        }
    },
}

</script>
