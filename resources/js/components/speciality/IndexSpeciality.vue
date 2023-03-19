<template>
    <MainLayout>
        <template v-slot:main-title>
            Отделение
        </template>
        <template v-slot:main-content>


            <div class="container">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Фильтры поиска</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display: block">
                            <div class="col-md-5">
                                <label for="department_id">Отделение</label>
                                <select name="department_id" id="department_id" class="form-control" aria-label="Disabled select example" v-model="data.department_id">
                                    <option selected value="0">Показать все департаменты</option>

                                    <option v-for="department in departments" :value="department.id">{{department.title_ru}}</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button class="btn btn-default" @click = "resetFilter()">Cбросить</button>
                                <button class="btn btn-primary ml-3" @click = "filter(data.department_id)">Применить</button>
                            </div>
                        </div>


                    </div>

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
                                    <th>Департамент</th>
                                    <th>Название отделения (RU)</th>
                                    <th>Название отделения (KZ)</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody v-for="speciality in specialities" :key="speciality.id">
                                <tr>
                                    <td>{{speciality.id}}</td>
                                    <td>{{speciality.department.title_ru}}</td>
                                    <td>{{speciality.title_ru}}</td>
                                    <td>{{speciality.title_kz}}</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditData(speciality)">
                                        <img src="../../assets/img/sliders.svg" alt="" style="width: 30px; height: 30px">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination :meta = meta @getResults = "getSpecialitiesWithPagination" :current_route=current_route></Pagination>
                        </div>
                    </div>
                </div>
            </div>

            <CreateSpeciality @refresh = refresh></CreateSpeciality>

            <UpdateSpeciality :editData = editData @refresh = refresh></UpdateSpeciality>

            <LoaderComponent :loading = loading></LoaderComponent>
        </template>
    </MainLayout>

</template>

<script>

    import useSpeciality from "./hooks/speciality";
    import useDepartments from "../department/hooks/department";
    import {onMounted, ref} from "vue";
    import {useRoute} from "vue-router"
    import Pagination from "../uicomponents/Pagination.vue";
    import MainLayout from "../../layouts/MainLayout.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";
    import CreateSpeciality from "./CreateSpeciality.vue";
    import UpdateSpeciality from "./UpdateSpeciality.vue";

export default {
    components: {Pagination,MainLayout,LoaderComponent,CreateSpeciality,UpdateSpeciality},

    props: {
        page: {
            type: String,
            default: "1",
        }
    },

    setup(props) {
        const {meta,current_route, specialities, getSpecialities, editData} = useSpeciality();
        const {departments, getDepartmentsAll} = useDepartments();

        const route = useRoute();

        const data = ref(
            {
                page: 1,
                department_id: 0
            }
        );
        let loading =  ref(false);
        function changeEditData(speciality) {
            editData.value = speciality;
        }

        onMounted(() => {
            refresh();
            getDepartmentsAll();
        });
       async function refresh() {
            loading.value = true;
            data.value.page = route.params.page || 1;
           await getSpecialities(data);
            loading.value = false;
        }

        async function getSpecialitiesWithPagination(page) {
           loading.value = true;
            data.value.page = page;
            await getSpecialities(data);
            loading.value = false;
        }
        
      async  function filter(department_id) {
           loading.value = true;
            data.department_id = department_id;
            route.params.page = 1;
            data.value.page  = 1;

            await getSpecialitiesWithPagination(data.value.page);
            loading.value = false;
        }
        async function resetFilter() {
           loading.value =true;
            data.value.department_id = 0;
            data.value.page  = 1;
            await getSpecialities(data);
            loading.value = false;
        }
        return {departments, specialities, loading, editData, meta, current_route, changeEditData, refresh, getSpecialitiesWithPagination, data, filter, resetFilter}
    }

    }
</script>



<style scoped>

</style>