<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
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
            <button type="button" class="btn btn-primary" @click = "update(editData, Close = this.$refs.Close)" >Сохранить</button>
        </template>
    </Form>
    <LoaderComponent :loading = loading></LoaderComponent>

</template>

<script>
    import Form from "../uicomponents/FormComponent.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";

    import {ref} from "vue";
    import useDepartment from "./hooks/department";


export default {
    props: ['editData'],
    components: {Form, LoaderComponent},
    emits: ['refresh'],

    setup(props, context) {
        let loading = ref(false);
        const {updateDepartment} = useDepartment();

        const Close = ref(null);
        async function update(editData, Close){
            loading.value = true;
           await updateDepartment(props.editData, Close);
           context.emit('refresh');
            loading.value = false;
        }

        return {
            Close,
            update,
            loading
        };
    }
}
</script>

<style scoped>

</style>