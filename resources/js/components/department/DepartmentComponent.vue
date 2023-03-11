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
                            <button class="btn btn-block bg-gradient-primary col-md-1">Создать</button>
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
                                        <button type="button" class="bg-transparent border-transparent fa fa-sliders-h text-blue" data-toggle="modal" data-target="#modal-default" @click="changeEditId(department)">
                                        </button>
                                        <UpdateFormComponent :editData = "editData" :modalview = 'modalview'>

                                        </UpdateFormComponent>
                                    </td>
                                </tr>
                                </tbody>
                            </table>


                            <nav aria-label="..." class="d-flex justify-content-between mt-3">
                                <div>
                                    <p class="small text-muted">
                                        Показаны
                                        <span class="fw-semibold">{{ meta.from }}</span>
                                        -
                                        <span class="fw-semibold">{{ meta.to }}</span>
                                        из
                                        <span class="fw-semibold">{{meta.total}}</span>
                                        записи
                                    </p>
                                </div>

                                  <ul class="pagination">
                                      <li :class="meta.current_page !== 1 ? 'page-item':'page-item disabled'">
                                          <a href="#" class="page-link" @click.prevent="getResults(meta.current_page-1)">Назад</a>
                                      </li>

                                      <li  v-for="link in meta.links" :class="link.active ?  'active page-item' : 'page-item'">
                                          <template v-if="Number(link.label) &&
                                  (meta.current_page - link.label < 2 && meta.current_page - link.label > -2) ||
                               Number(link.label) === 1 ||  Number(link.label) === meta.last_page
                               ">
                                              <a @click.prevent="getResults(link.label)"
                                                 href="#" class="page-link">{{link.label}}</a>
                                          </template>
                                      </li>
                                      <li :class="meta.current_page !== meta.last_page ? 'page-item':'page-item disabled'">
                                          <a class="page-link" href="#" @click.prevent="getResults(meta.current_page+1)">Далее</a>
                                      </li>
                                  </ul>

                              </nav>

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

    export default {
        components: {
             MainLayout: MainLayout,
            UpdateFormComponent: UpdateFormComponent
            },
        data(){
            return {
                departments: {},
                active: 'd-none',
                counter: 1,
                editId: null,
                editData:{},
                modalview: 'fade',
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
                        this.meta =response.data.meta;
                        return this.departments = response.data;
                    });
            },

            changeEditId(department){
                this.editData = department;
            },
        }
    }
</script>
