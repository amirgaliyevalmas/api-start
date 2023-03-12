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
                                    data-target="#modal-create">Создать</button>
                            <CreateFormComponent @getResults = "getResults">

                            </CreateFormComponent>
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
                                <tbody v-for="department in departments.data" :key="department.id">
                                <tr>
                                    <td>{{department.id}}</td>
                                    <td>{{department.title_ru}}</td>
                                    <td>{{department.title_kz}}</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent fa fa-sliders-h text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditId(department)">
                                        </button>

                                        <UpdateFormComponent :editData = "editData">

                                        </UpdateFormComponent>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                         <Pagination :meta = meta @getResults = "getResults"></Pagination>

                        </div>

                    </div>
                </div>
            </div>
        </template>
    </MainLayout>


</template>

<script>
    import MainLayout from "../../layouts/MainLayout.vue";
    import UpdateFormComponent from './UpdateFormComponent.vue';
    import CreateFormComponent from './CreateFormComponent.vue';

    import PaginationComponent from '../uicomponents/PaginationComponent.vue';

    export default {
        components: {
            Pagination: PaginationComponent,
            MainLayout: MainLayout,
            UpdateFormComponent: UpdateFormComponent,
            CreateFormComponent: CreateFormComponent
            },
        data(){
            return {
                departments: {},
                editId: null,
                editData:{},
                meta: {}
            }
        },
        mounted() {
            this.getResults();
        },
        methods: {
            getResults(page = 1) {
                axios.get('/api/v1/department?page=' + page)
                    .then(response => {
                        this.meta = response.data.meta;
                        return this.departments = response.data;
                    });
            },

            changeEditId(department){
                this.editData = department;
            },
        }
    }
</script>
