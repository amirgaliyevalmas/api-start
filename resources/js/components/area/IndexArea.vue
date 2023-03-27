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
                                <label for="department_id">Название отделение</label>
                                <select name="department_id" id="department_id" class="form-control" aria-label="Disabled select example" v-model="data.department_id">
                                    <option selected value="0">Показать все отделение</option>

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
                                    <th>Отделение</th>
                                    <th>Название и номер участка (RU)</th>
                                    <th>Название и номер участка  (KZ)</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody v-for="area in areas" :key="area.id">
                                <tr>
                                    <td>{{area.id}}</td>
                                    <td>{{area.department.title_ru}}</td>
                                    <td>{{area.title_ru}}</td>
                                    <td>{{area.title_kz}}</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditData(area)">
                                        <img src="../../assets/img/sliders.svg" alt="" style="width: 30px; height: 30px">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination :meta = meta @getResults = "getAreasWithPagination" :current_route=current_route></Pagination>
                        </div>
                    </div>
                </div>
            </div>

            <CreateArea @refresh = refresh></CreateArea>

            <UpdateArea :editData = editData @refresh = refresh></UpdateArea>

            <LoaderComponent :loading = loading></LoaderComponent>
        </template>
    </MainLayout>

</template>

<script>

    import useArea from "./hooks/area";
    import useDepartments from "../department/hooks/department";
    import {onMounted, ref} from "vue";
    import {useRoute} from "vue-router"
    import Pagination from "../uicomponents/Pagination.vue";
    import MainLayout from "../../layouts/MainLayout.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";
    import CreateArea from "./CreateArea.vue";
    import UpdateArea from "./UpdateArea.vue";

export default {
    components: {Pagination,MainLayout,LoaderComponent,CreateArea,UpdateArea},

    props: {
        page: {
            type: String,
            default: "1",
        }
    },

    setup(props) {
        const {meta,current_route, areas, getAreas, editData} = useArea();
        const {departments, getDepartmentsAll} = useDepartments();

        const route = useRoute();

        const data = ref(
            {
                page: 1,
                department_id: 0
            }
        );
        let loading =  ref(false);
        function changeEditData(area) {
            editData.value = area;
        }

        onMounted(() => {
            refresh();
            getDepartmentsAll();
        });
       async function refresh() {
            loading.value = true;
            data.value.page = route.params.page || 1;
           await getAreas(data);
            loading.value = false;
        }

        async function getAreasWithPagination(page) {
           loading.value = true;
            data.value.page = page;
            await getAreas(data);
            loading.value = false;
        }
        
      async  function filter(department_id) {
           loading.value = true;
            data.department_id = department_id;
            route.params.page = 1;
            data.value.page  = 1;

            await getAreasWithPagination(data.value.page);
            loading.value = false;
        }
        async function resetFilter() {
           loading.value =true;
            data.value.department_id = 0;
            data.value.page  = 1;
            await getAreas(data);
            loading.value = false;
        }
        return {departments, areas, loading, editData, meta, current_route, changeEditData, refresh, getAreasWithPagination, data, filter, resetFilter}
    }

    }
</script>



<style scoped>

</style>