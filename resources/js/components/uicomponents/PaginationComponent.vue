<template>
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
                <a href="#" class="page-link" @click.prevent="$emit('getResults', meta.current_page-1)">Назад</a>
            </li>

            <li  v-for="link in meta.links" :class="link.active ?  'active page-item' : 'page-item'">
                <template v-if="Number(link.label) &&
                                  (meta.current_page - link.label < 2 && meta.current_page - link.label > -2) ||
                               Number(link.label) === 1 ||  Number(link.label) === meta.last_page
                               ">
                    <a @click.prevent="$emit('getResults', link.label)"
                       href="#" class="page-link">{{link.label}}</a>
                </template>
            </li>
            <li :class="meta.current_page !== meta.last_page ? 'page-item':'page-item disabled'">
                <a class="page-link" href="#" @click.prevent="$emit('getResults',meta.current_page+1)">Далее</a>
            </li>
        </ul>

    </nav>

</template>

<script>
    export default {
        props: ['meta'],
        name: "PaginationComponent",
    }
</script>

<style scoped>

</style>