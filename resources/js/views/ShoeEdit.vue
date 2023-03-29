<template>
    <p class="container m-auto">Edit</p>
   <div class="container m-auto flex items-center">
       <form method="PUT" action="http://hello_world.local/api/shoe/3">
           <p>Name</p>
           <input class="bg-slate-200" type="text" :value="shoes.name"/>

           <p>Price</p>
           <input class="bg-slate-200" type="text" :value="shoes.price"/>

           <p>Quantity</p>
           <input class="bg-slate-200" type="number" :value="shoes.quantity">

           <button class="bg-green-300 rounded-md p-1" type="submit">Edit</button>
       </form>
   </div>
</template>
<script>
export default {
    data() {
        return {
            shoes: [],
            id: this.$route.params.id,
        }
    },

    methods: {
        async editShoe() {
            // await axios
            // .get('http://hello_world.local/api/shoe/1')
            // .then(response => {
            //     this.shoe = response.data
            //     console.log(this.shoe)
            // })

            const api = "http://hello_world.local/api/shoe/"
            const idShoe = this.$route.params.id.toString()
            const fullApi = api + idShoe
            const res = await fetch(fullApi);
            const finalRes = await res.json();
            this.shoes = finalRes;
        }
    },

    mounted() {
        this.editShoe()
    }
}
</script>
