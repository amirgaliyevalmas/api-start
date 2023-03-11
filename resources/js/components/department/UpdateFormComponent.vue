<template>
    <div class="modal fade {{modalview}}" id="modal-default" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Редактирование отделение</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="title_ru" class="mt-3">Наз на ру</label>
                    <input type="text" name="title_ru" class="form-control" :value=editData.title_ru>

                    <label for="title_kz" class="mt-3">Наз на кз</label>
                    <input type="text" name="title_kz" class="form-control" :value=editData.title_kz>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['editData', 'showmodal'],
    }
</script>

<style scoped>

</style>