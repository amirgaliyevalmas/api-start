<template>

<Form id="modal-edit">
    <template v-slot:title>
        Редактировать
    </template>
    <template v-slot:form>
        <label for="title_ru" class="mt-3">Наз на ру</label>
        <input type="text" name="title_ru" class="form-control" v-model=editData.title_ru>

        <label for="title_kz" class="mt-3">Наз на кз</label>
        <input type="text" name="title_kz" class="form-control" v-model=editData.title_kz>
    </template>

    <template v-slot:action>
        <button type="button" class="btn btn-default" data-dismiss="modal" ref="Close">Отменить</button>
        <button type="button" class="btn btn-primary" @click = "update()" >Сохранить</button>
    </template>
</Form>




    <Loader :loading = loading></Loader>

</template>

<script>
    import Loader from '../uicomponents/LoaderComponent.vue';
    import Form from '../uicomponents/FormComponent.vue';

    export default {
        props: ['editData'],
        components: {
            Loader : Loader,
            Form: Form
        },
        data(){
            return{
                id: '',
                title_kz: '',
                title_ru: '',
                loading: false,
            }
        },

        methods:{
            update(department){
                department = this.editData.id;
                this.loading = true;

                axios.patch(`/api/v1/department/${department}`, { title_kz: this.editData.title_kz, title_ru : this.editData.title_ru})
                    .then(res => {
                        if(res.status == "200"){
                            this.$toast.success(`Успешно сохронено`);
                            this.$refs.Close.click();
                        }
                      })
                    .finally(() => {
                        this.loading = false
                    })
                    .catch(res => {
                        this.$toast.error(`Ошибка`);
                    });
            },
        },
    }
</script>

<style scoped>

</style>