<template>
    <MainLayout>
        <template v-slot:main-title>
            Главная
        </template>
        <template v-slot:main-content>
            Главная
        </template>
    </MainLayout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout.vue";

    export default {
        components: {MainLayout},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
