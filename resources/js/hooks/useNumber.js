import {computed, ref} from "vue";

export const useNumber = () => {
    let number = ref(1)
    function inCreaseNum() {
        number.value+=2
    }
    const double = computed(() => {
        return number.value*2
    })

    return {number, inCreaseNum, double}
}
