<template>
    <MainLayout>
        <template v-slot:main-title>
            Кабинеты
        </template>
        <template v-slot:main-content>
            Кабинеты
        </template>
    </MainLayout>

</template>

<script>
    import MainLayout from "../../layouts/MainLayout.vue";

    export default {
        components: {MainLayout},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
