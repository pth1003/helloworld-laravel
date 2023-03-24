<template>
    Todolist
    <input placeholder="Enter work" v-model="name_work"/>
    <button @click="addWork()">Add work</button>
    <ul>
        <li v-for="(work,idx) in listWork" :key="idx">
            {{work}} -
            <button @click="removeWork(idx)">X</button>
        </li>
    </ul>
</template>

<script>
export default {
    data () {
        return {
            listWork: [
               'quet nha',
               'an com',
               'giac do',
            ],
            name_work: ''
        }
    },

    methods: {
        addWork() {
            var newWork = this.name_work
            var isWork = 0
            this.listWork.forEach(work => {
                if(newWork === work) {
                    alert('Cong viec da ton tai')
                } else {
                    isWork = 1
                }
            })

            if(isWork == 1) {
                this.listWork.splice(0,0, newWork)
            }

            this.name_work = ''
        },

        removeWork(idx) {
            this.listWork.splice(idx, 1)
        }
    },

    computed: {

    }

}
</script>
