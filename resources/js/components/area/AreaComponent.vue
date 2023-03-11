<template>
    <MainLayout>
        <template v-slot:main-title>
            Участки
        </template>
        <template v-slot:main-content>
            Участки
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
