<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "LandStatistics",
    props: {
        lands_statistics: []
    },

})
</script>

<template>
    <div class="dashboard-card m-3">
        <div class="card-head">
            <h3 class="dark-inverted">{{ trans('lands_statistics') }}</h3>
        </div>

        <div v-for="(count,status) in lands_statistics" class="widget-toolbar">
            <div class="left"><h3>{{ trans(status) }}</h3></div>
            <div class="right"><small class="tag is-rounded">{{ count }}</small></div>
        </div>
    </div>
</template>

<style scoped>
.dashboard-card .card-head {
    border-bottom: 1px solid #eee;
}
</style>
