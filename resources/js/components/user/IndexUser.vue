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
                                    <th>ФИО</th>
                                    <th>Отделение</th>
                                    <th>Специальность</th>
                                    <th>Участок</th>
                                    <th>Логин</th>
                                    <th>Роль</th>
                                    <th>Статус</th>
                                    <th>Действие</th>

                                </tr>
                                </thead>
                                <tbody v-for="user in users" :key="user.id">
                                <tr>
                                    <td>{{user.id}}</td>
                                    <td>{{user.name}}</td>
                                    <td>{{user.department !== null ? user.department.title_ru : '-'}}</td>
                                    <td>{{user.speciality !== null ? user.speciality.title_ru : '-'}}</td>
                                    <td>
                                        <ul style="list-style: none; padding: 0" v-for="area in user.area">
                                            <li  v-show="area !== null">
                                                {{area.title_ru}}
                                            </li>
                                        </ul>
                                        <span v-if="user.area.length === 0">
                                            -
                                        </span>
                                    </td>
                                    <td>{{user.email}}</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditData(user)">
                                        <img src="../../assets/img/sliders.svg" alt="" style="width: 30px; height: 30px">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination :meta = meta @getResults = "getUsersWithPagination" :current_route=current_route></Pagination>
                        </div>
                    </div>
                </div>
            </div>

        <!--    <CreateSpeciality @refresh = refresh></CreateSpeciality>

            <UpdateSpeciality :editData = editData @refresh = refresh></UpdateSpeciality>
-->
            <LoaderComponent :loading = loading></LoaderComponent>
        </template>
    </MainLayout>

</template>

<script>

    import useUser from "./hooks/user";
    import useDepartments from "../department/hooks/department";
    import {onMounted, ref} from "vue";
    import {useRoute} from "vue-router"
    import Pagination from "../uicomponents/Pagination.vue";
    import MainLayout from "../../layouts/MainLayout.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";
    import CreateUser from "./CreateUser.vue";
    import UpdateUser from "./UpdateUser.vue";

export default {
    components: {Pagination,MainLayout,LoaderComponent,CreateUser,UpdateUser},

    props: {
        page: {
            type: String,
            default: "1",
        }
    },

    setup(props) {
        const {meta,current_route, users, getUsers, editData} = useUser();
        const {departments, getDepartmentsAll} = useDepartments();

        const route = useRoute();

        const data = ref(
            {
                page: 1,
                department_id: 0
            }
        );
        let loading =  ref(false);
        function changeEditData(user) {
            editData.value = user;
        }

        onMounted(() => {
            refresh();
            getDepartmentsAll();
        });
       async function refresh() {
            loading.value = true;
            data.value.page = route.params.page || 1;
           await getUsers(data);
            loading.value = false;
        }

        async function getUsersWithPagination(page) {
           loading.value = true;
            data.value.page = page;
            await getUsers(data);
            loading.value = false;
        }
        
      async  function filter(department_id) {
           loading.value = true;
            data.department_id = department_id;
            route.params.page = 1;
            data.value.page  = 1;

            await getUsersWithPagination(data.value.page);
            loading.value = false;
        }
        async function resetFilter() {
           loading.value =true;
            data.value.department_id = 0;
            data.value.page  = 1;
            await getUsers(data);
            loading.value = false;
        }
        return {departments, users, loading, editData, meta, current_route, changeEditData, refresh, getUsersWithPagination, data, filter, resetFilter}
    }

    }
</script>



<style scoped>

</style>