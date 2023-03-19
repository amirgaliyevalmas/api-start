<template xmlns:v-slot="http://www.w3.org/1999/XSL/Transform">
    <Form id="modal-edit">
        <template v-slot:title>
            Редактировать
        </template>
        <template v-slot:form>

            <label for="department_id" class="mt-3">Отделение</label>
            <select name="department" id="department_id" class="form-control" aria-label="Disabled select example" v-model="editData.department.id">
                <option v-for="department in departments" :value="department.id">{{department.title_ru}}</option>
            </select>

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
    <LoaderComponent :loading="loading"></LoaderComponent>
</template>

<script>
    import Form from "../uicomponents/FormComponent.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";

    import {ref, onMounted} from "vue";
    import useSpeciality from "./hooks/speciality";
    import useDepartments from "../department/hooks/department";

export default {
    props: ['editData'],
    components: {Form, LoaderComponent},
    emits: ['refresh'],

    setup(props, context) {
        let loading = ref(false);
        const {departments, getDepartmentsAll} = useDepartments();
        const {updateSpeciality} = useSpeciality();

        const Close = ref(null);
        async function update(editData, Close){
            loading.value = true;
           await updateSpeciality(props.editData, Close);
           context.emit('refresh');
           loading.value = false;
        }
        onMounted(() => {
            getDepartmentsAll();
        });

        return {
            departments,
            Close,
            update,
            loading
        };
    }
}
</script>

<style scoped>

</style>