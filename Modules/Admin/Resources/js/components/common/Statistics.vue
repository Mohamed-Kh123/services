<script>
import {defineComponent} from 'vue'
/*
 const OPEN_LAND_STATUS = 'open';
    const TEMPORARY_LAND_STATUS = 'temporary_booking';
    const PERMANENT_LAND_STATUS = 'permanent_booking';
    const SOLD_LAND_STATUS = 'sold';
 */
export default defineComponent({
    name: "Statistics",
    props: {
        statistics : []
    },
    // computed: {
    //     statistics() {
    //         let items = ['open', 'temporary_booking', 'permanent_booking', 'sold'];
    //         return _.each(items, function (result, value, key) {
    //             console.log('result', result, value, key)
    //         })
    //     }
    // }
})
</script>

<template>
    <!--Dashboard Tile-->
    <div v-for="(statistic,index) in statistics" :key="index" class="column is-3">
        <div class="dashboard-tile">
            <div class="tile-head">
                <h3 class="dark-inverted">{{trans(statistic.label)}}</h3>
                <VIconBox color="primary" size="small" rounded>
                    <i aria-hidden="true" :class="statistic?.icon ?? `fas fa-gem`"></i>
                </VIconBox>
            </div>
            <div class="tile-body">
                <span class="dark-inverted">{{trans(statistic.value ?? 0)}}</span>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
