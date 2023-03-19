<template>
    <MainLayout>
        <template v-slot:main-title>
            Отделение
        </template>
        <template v-slot:main-content>

            <div class="container">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <button class="btn btn-block bg-gradient-primary col-md-1"  data-toggle="modal"
                                    data-target="#modal-create"> Создать</button>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название отделения (RU)</th>
                                    <th>Название отделения (KZ)</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody v-for="department in departments" :key="department.id">
                                <tr>
                                    <td>{{department.id}}</td>
                                    <td>{{department.title_ru}}</td>
                                    <td>{{department.title_kz}}</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditData(department)">
                                        <img src="../../assets/img/sliders.svg" alt="" style="width: 30px; height: 30px">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination :meta = meta @getResults = "getDepartments" :current_route=current_route></Pagination>
                        </div>
                    </div>
                </div>
            </div>

            <CreateDepartment @refresh = refresh></CreateDepartment>

            <UpdateDepartment :editData = editData @refresh = refresh></UpdateDepartment>

            <LoaderComponent :loading = loading></LoaderComponent>
        </template>
    </MainLayout>

</template>

<script>

    import useDepartment from "./hooks/department";
    import {onMounted, ref} from "vue";
    import {useRoute} from "vue-router"
    import Pagination from "../uicomponents/Pagination.vue";
    import MainLayout from "../../layouts/MainLayout.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";
    import CreateDepartment from "./CreateDepartment.vue";
    import UpdateDepartment from "./UpdateDepartment.vue";

export default {
    components: {Pagination,MainLayout,LoaderComponent,CreateDepartment,UpdateDepartment},

    props: {
        page: {
            type: String,
            default: "1",
        }
    },

    setup(props) {
        let loading = ref(false);
        const {meta,current_route, departments, getDepartments, editData} = useDepartment();
        const route = useRoute();

        function changeEditData(department) {
            editData.value = department;
        }

        onMounted(() => {
            refresh();
        });
        async function refresh() {
            loading.value = true;
            await getDepartments(route.params.page || props.page );
            loading.value = false;
        }
        return {departments, loading, editData, meta, current_route, getDepartments,changeEditData, refresh}
    }

    }
</script>



<style scoped>

</style>