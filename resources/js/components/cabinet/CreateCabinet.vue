<template>
    <FormComponent id="modal-create">
        <template v-slot:title>
            Создать
        </template>
        <template v-slot:form>
            <label for="cabinet_name" class="mt-3">Номер кабинета</label>
            <input type="text" name="cabinet_name" class="form-control" v-model=data.cabinet_name>

            <label for="title_ru" class="mt-3">Наз на ру</label>
            <input type="text" name="title_ru" class="form-control" v-model=data.title_ru>

            <label for="title_kz" class="mt-3">Наз на кз</label>
            <input type="text" name="title_kz" class="form-control" v-model=data.title_kz>
        </template>

        <template v-slot:action>
            <button type="button" class="btn btn-default" data-dismiss="modal" ref="Close">Отменить</button>
            <button type="button" class="btn btn-primary" @click="create(data, Close = this.$refs.Close)">
                Сохранить
            </button>
        </template>
    </FormComponent>
    <LoaderComponent :loading = loading></LoaderComponent>
</template>

<script>
    import useCabinet from "../cabinet/hooks/cabinet";
    import {ref} from "vue";
    import FormComponent from "../uicomponents/FormComponent.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";


    export default {
        components: {
            FormComponent,
            LoaderComponent
        },
        emits: ['refresh'],

        setup(props, context) {
            let loading = ref(false);
            const { data, storeCabinet} = useCabinet();

            async function create(data, Close) {
                loading.value = true;
               await storeCabinet(data, Close);
                context.emit('refresh');
                loading.value = false;
            }
            const Close = ref(null);

            return {Close, data, create, loading}
        }
    }
</script>

<style scoped>

</style>