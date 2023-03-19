<template>
    <div class="modal fade" id="modal-default" aria-modal="true" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><slot name = "title"></slot></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <slot name = "form"></slot>
                    </div>

                    <div class="modal-footer justify-content-between" style="margin-top: 200px;">
                        <slot name="action"></slot>
                    </div>
                </form>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "FormComponent"
    }
</script>

<style scoped>

</style>