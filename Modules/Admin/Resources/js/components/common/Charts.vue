<script>
import {defineComponent} from 'vue'
import MultiLineStatisticChart from "nawadash/src/components/basic/dashboard/MultiLineStatisticChart.vue";
import notificationList from "nawadash/src/components/basic/dashboard/notificationList.vue";

export default defineComponent({
    name: "Charts",
    components:{
        MultiLineStatisticChart,
        notificationList,
    },
    props : {
        charts : [],
    }
})
</script>

<template>
    <div v-for="{ component , index, ...item } in charts" v-bind:key="index"
         :class="`column is-${item.cols ?? 12}`">
        <div class="dashboard-card">
<!--            <div class="card-head">-->
<!--                <h3 class="dark-inverted">{{trans(item?.title ?? '')}}</h3>-->
<!--            </div>-->
            <component  :is="component" v-bind="item" @refetch="fetch"/>
        </div>
    </div>
</template>

<style scoped>
.dashboard-card-custom{
    .quick-stat{
        padding: 10px !important;
        margin: 4px !important;
    }
    .dashboard-card{
        border: 0 !important;
    }
}
</style>
