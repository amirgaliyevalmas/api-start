<template>
    <div class="modal fade" id="modal-default" aria-modal="true" role="dialog"  v-if="mod === true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Редактирование отделение</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <label for="title_ru" class="mt-3">Наз на ру</label>
                        <input type="text" name="title_ru" class="form-control" v-model=editData.title_ru>

                        <label for="title_kz" class="mt-3">Наз на кз</label>
                        <input type="text" name="title_kz" class="form-control" v-model=editData.title_kz>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal" ref="Close">Отменить</button>

                        <button type="button" class="btn btn-primary" @click = "update()" >Сохранить</button>

                    </div>
                </form>
            </div>

        </div>
    </div>


</template>

<script>
    export default {
        props: ['editData', 'showmodal'],
        data(){
            return{
                id: '',
                title_kz: '',
                title_ru: '',
                mod: true,
                isActive: 'modal fade show'
            }
        },
        mounted(){

        },
        methods:{
            update(department){
                department = this.editData.id;

                axios.patch(`/api/v1/department/${department}`, { title_kz: this.editData.title_kz, title_ru : this.editData.title_ru})
                    .then(res => {
                        if(res.status == "200"){
                            this.$toast.success(`Hey! I'm here`);

                            this.mod = false;
                            this.$refs.Close.click();
                            return this.$router.push('/department');
                        }
                    })
            },
        },
    }
</script>

<style scoped>

</style>