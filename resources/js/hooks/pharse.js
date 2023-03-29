import {ref, watchEffect} from "vue";

export const usePharse = () => {
    //Watcher:
    const pharse = ref('')
    const reversePharse = ref('')
    const reversePharse1 = ref('')

    watchEffect(() => {
        reversePharse.value = pharse.value.split('').reverse().join('')
    })

    watchEffect(() => {
        reversePharse1.value = pharse.value.split('').reverse().join('-')
    })

    return {pharse, reversePharse, reversePharse1}
}
