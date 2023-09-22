<template>
    <div class="dashboard-card">
        <div class="card-head">
            <h3 class="dark-inverted">{{ this.valueByLocale(data?.main_title) }}</h3>
        </div>
        <div class="revenue-stats">
            <div v-for="item in data?.labels" class="revenue-stat">
                <span>{{ this.valueByLocale(item?.name) }}</span>
                <span class="current">{{ item?.price }}</span>
            </div>
        </div>
        <ApexChart
            id="apex-chart-12"
            :height="getSparkConfig(data)?.chart.height"
            :type="getSparkConfig(data)?.chart.type"
            :series="getSparkConfig(data)?.series"
            :options="getSparkConfig(data)"
        >
        </ApexChart>
    </div>
</template>

<script>
// import { getValueByLocale } from "nawadash/src/utils/helper";
import { useI18n } from "vue-i18n";
import ApexChart from "vue3-apexcharts";

export default {
    name: "CustomApexChart",
    props: {
        data: Object,
        index: Number,
    },
    components: {
        ApexChart,
    },
    methods: {
        // getValueByLocale,
        // valueByLocale(value){
        //     return _.get(value, locale.value ?? "ar", value);
        // },
        getSparkConfig(item, index) {
            return {
                series: item?.series,
                /*
                [
                    {
                        name: 'Inflation',
                        data: [2.3, 3.1, 4.0, 10.1, 4.0, 3.6, 3.2, 2.3, 1.4, 0.8, 0.5, 0.2],
                    },
                ]
                 */
                chart: {
                    height: 305,
                    type: 'bar',
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    },
                },
                dataLabels: {
                    enabled: true,
                    // formatter: formatters.asPercent,
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ['#304758'],
                    },
                },
                xaxis: {
                    categories: item?.categories,
                    position: 'top',
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            },
                        },
                    },
                    tooltip: {
                        enabled: true,
                    },
                },
                yaxis: {
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        // formatter: formatters.asPercent,
                    },
                },
                colors: [ '#06D69EFF', '#06D69EFF','#06D69EFF'],
                // title: {
                //     text: 'Bar Chart',
                //     align: 'left',
                // },
            }
        },
    },
    setup() {
        const { locale } = useI18n();

        return {
            valueByLocale(value) {
                return _.get(value, locale.value ?? "ar", value);
            },
        };
    },
};
</script>
<!--<style lang="scss">-->
<!--.vue-apexcharts {-->
<!--    direction: ltr;-->
<!--}-->
<!--.apexcharts-yaxis {-->
<!--    display: none !important;-->
<!--}-->
<!--html[dir="rtl"] {-->
<!--    .apexcharts-title-text {-->
<!--        font-family: Cairo, serif !important;-->
<!--    }-->
<!--}-->
<!--.apexcharts-title-text {-->
<!--    font-size: 16px;-->
<!--}-->
<!--.apexcharts-subtitle-text {-->
<!--    font-size: 20px;-->
<!--}-->
<!--</style>-->
