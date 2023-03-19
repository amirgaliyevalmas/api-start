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
                <router-link :to="{path: `/${current_route}/${meta.current_page-1}`}" class="page-link" @click.prevent="$emit('getResults', meta.current_page-1)">Назад</router-link>
            </li>

            <li  v-for="link in meta.links" :class="link.active ?  'active page-item' : 'page-item'">
                <template v-if="Number(link.label) &&
                                  (meta.current_page - link.label < 2 && meta.current_page - link.label > -2) ||
                               Number(link.label) === 1 ||  Number(link.label) === meta.last_page
                               ">
                    <router-link :to="{path: `/${current_route}/${link.label}`}" @click.prevent="$emit('getResults', link.label)"
                        class="page-link">{{link.label}}</router-link>
                </template>
            </li>
            <li :class="meta.current_page !== meta.last_page ? 'page-item':'page-item disabled'">
                <router-link :to="{path: `/${current_route}/${meta.current_page+1}`}"  class="page-link"  @click.prevent="$emit('getResults',meta.current_page+1)">Далее</router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: {
            meta: {},
            current_route: ""
        },
        name: "Pagination",

    }

</script>

<style scoped>

</style>