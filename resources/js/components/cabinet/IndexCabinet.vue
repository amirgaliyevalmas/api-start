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
                                    <th>Номер кабинета</th>
                                    <th>Название отделения (RU)</th>
                                    <th>Название отделения (KZ)</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody v-for="cabinet in cabinets" :key="cabinet.id">
                                <tr>
                                    <td>{{cabinet.id}}</td>
                                    <td>{{cabinet.cabinet_name}}</td>
                                    <td>{{cabinet.title_ru}}</td>
                                    <td>{{cabinet.title_kz}}</td>
                                    <td>
                                        <button type="button" class="bg-transparent border-transparent text-blue"
                                                data-toggle="modal" data-target="#modal-edit" @click="changeEditData(cabinet)">
                                        <img src="../../assets/img/sliders.svg" alt="" style="width: 30px; height: 30px">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination :meta = meta @getResults = "getResults" :current_route=current_route></Pagination>
                        </div>
                    </div>
                </div>
            </div>

            <CreateCabinet @refresh = refresh></CreateCabinet>

            <UpdateCabinet :editData = editData @refresh = refresh></UpdateCabinet>

            <LoaderComponent :loading = loading></LoaderComponent>
        </template>
    </MainLayout>

</template>

<script>

    import useCabinet from "./hooks/cabinet";
    import {onMounted, ref} from "vue";
    import {useRoute} from "vue-router"
    import Pagination from "../uicomponents/Pagination.vue";
    import MainLayout from "../../layouts/MainLayout.vue";
    import LoaderComponent from "../uicomponents/LoaderComponent.vue";
    import CreateCabinet from "./CreateCabinet.vue";
    import UpdateCabinet from "./UpdateCabinet.vue";

export default {
    components: {Pagination,MainLayout,LoaderComponent,CreateCabinet,UpdateCabinet},

    props: {
        page: {
            type: String,
            default: "1",
        }
    },

    setup(props) {
        let loading = ref(false);
        const {meta,current_route, cabinets, getCabinets, editData} = useCabinet();
        const route = useRoute();

        function changeEditData(cabinet) {
            editData.value = cabinet;
        }

        onMounted(() => {
            refresh();
        });
        async function refresh() {
            loading.value = true;
            await getCabinets(route.params.page || props.page );
            loading.value = false;
        }
        async function getResults(page) {
            loading.value = true;
            await getCabinets(page);
            loading.value = false;
        }

        return {cabinets, loading, editData, meta, current_route, getResults,changeEditData, refresh}
    }
    }
</script>



<style scoped>

</style>