<template>

    <Form id="modal-create">
        <template v-slot:title>
            Создать
        </template>
        <template v-slot:form>
            <label for="title_ru" class="mt-3">Наз на ру</label>
            <input type="text" name="title_ru" class="form-control" v-model=title_ru>

            <label for="title_kz" class="mt-3">Наз на кз</label>
            <input type="text" name="title_kz" class="form-control" v-model=title_kz>
        </template>

        <template v-slot:action>
            <button type="button" class="btn btn-default" data-dismiss="modal" ref="Close">Отменить</button>
            <button type="button" class="btn btn-primary" @click = "create()" >Сохранить</button>
        </template>
    </Form>


    <Loader :loading = loading></Loader>

</template>

<script>
    import Loader from '../uicomponents/LoaderComponent.vue';
    import Form from '../uicomponents/FormComponent.vue';

    export default {
        components: {
            Loader : Loader,
            Form: Form
        },
        data(){
            return{
                title_kz: '',
                title_ru: '',
                loading: false,
            }
        },

        methods:{
            create(){
                this.loading = true;
                axios.post(`/api/v1/department`, { title_kz: this.title_kz, title_ru : this.title_ru})
                    .then(res => {
                        console.log(res);
                        if(res.status == "200"){
                            this.$toast.success(`Успешно сохронено`);
                            this.$refs.Close.click();
                            this.$emit('getResults');
                        }
                    }).catch(res => {
                    this.$toast.error(`Ошибка`);
                }).finally(() => this.loading = false);
            },
        },
    }
</script>

<style scoped>

</style>