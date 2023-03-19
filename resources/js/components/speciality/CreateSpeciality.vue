<template>
    <FormComponent id="modal-create">
        <template v-slot:title>
            Создать
        </template>
        <template v-slot:form>
            <label for="department_id" class="mt-3">Отделение</label>
            <select name="department_id" id="department_id" class="form-control" aria-label="Disabled select example"
                    v-model="data.department_id">
                <option v-for="department in departments" :value="department.id">{{department.title_ru}}</option>
            </select>

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
    import useSpeciality from "./hooks/speciality";
    import useDepartments from "../department/hooks/department";
    import {ref, onMounted} from "vue";
    import FormComponent from "../uicomponents/FormComponent.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";


    export default {
        components: {
            FormComponent,
            LoaderComponent
        },
        emits: ['refresh'],

        setup(props, context) {
            const {data, storeSpeciality} = useSpeciality();
            const {departments, getDepartmentsAll} = useDepartments();

            let loading = ref(false);

            onMounted(() => {
                getDepartmentsAll();
            });

            async function create(data, Close) {
                loading.vlaue = true;
               await storeSpeciality(data, Close);
                context.emit('refresh');
                loading.value = false;
            }
            const Close = ref(null);

            return {departments, Close, storeSpeciality, data, create, loading}
        }
    }
</script>

<style scoped>

</style>