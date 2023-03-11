<template>
    <MainLayout>
     <template v-slot:main-title>
            Сотрудники
     </template>

     <template v-slot:main-content>
            <button type="submit" @click="getResults">safsafa</button>
     </template>
 </MainLayout>


</template>

<script>
    import MainLayout from "../../layouts/MainLayout.vue";
    export default {
        components: {MainLayout},
        mounted() {
            console.log('Component mounted. two')
        },
        methods:{
            getResults() {
                axios.get('/api/tasks')
                    .then(response => {
                        console.log(response.data);
                    });
            }
        }

    }
</script>
