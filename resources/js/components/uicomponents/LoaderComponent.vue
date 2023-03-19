<template>
    <div style="width: 100vw; height: 100vh; background-color: #0a0e14; position: fixed; top: 0; left: 0; opacity: 0.1; z-index: 100000;" v-if = loading>
        <div  style="position: absolute; top: 45vh; left: 50vw;">
            <img src="../../assets/img/preloader2.gif" style="width: 100px;">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['loading'],
        name: "LoaderComponent"
    }
</script>

<style scoped>

</style>