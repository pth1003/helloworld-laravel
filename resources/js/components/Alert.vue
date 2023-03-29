<template>
    <div v-if="!flag">Name changed</div>
</template>

<script>
import {computed} from "vue";

export default {
    props: ['user'],
    setup(props, context) {
        // context.emit('change', {})
        const flag = computed(() => {
            return props.user.name === 'John'
        })

        return {
            flag
        }
    }
}
</script>
