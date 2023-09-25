<script>
import {defineComponent} from 'vue'
import ApexChart from 'vue3-apexcharts';
import {useI18n} from "vue-i18n";
import {getValueByLocale} from "nawadash/src/utils/helper";

export default defineComponent({
    name: "CustomApexChart",
    methods: {getValueByLocale},
    components: {
        ApexChart
    },
    props: {
        data: Object,
        index: Number
    },
    setup(props) {
        const {locale} = useI18n();
        const valueByLocale = (value) => {
            return _.get(value, locale.value ?? "ar", value);
        }

        const getSparkConfig = function (item, index) {

            return {
                series: item?.series,
                chart: {
                    height: 250,
                    type: 'area',
                    offsetY: -10,
                    toolbar: {
                        show: false,
                    },
                },
                colors: item?.color,
                legend: {
                    position: 'bottom',
                    horizontalAlign: 'center',
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: [2, 2, 2],
                    curve: 'smooth',
                },
                xaxis: {
                    type: 'datetime',
                    categories: item?.categories,
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm',
                    },
                    y: {
                        formatter: function (val) {
                            return valueByLocale(item?.currency) + " " + val
                        },
                    },
                },
            }
        };


        return {
            getSparkConfig,
            valueByLocale
        }
    }
})
</script>

<template>
    <div class="dashboard-card">
        <div class="card-head">
            <h3 class="dark-inverted">{{ valueByLocale(data?.main_title) }}</h3>
        </div>
        <div class="revenue-stats">
            <div v-for="item in data?.labels" class="revenue-stat">
                <span>{{ valueByLocale(item?.name) }}</span>
                <span class="current">{{ valueByLocale(item?.currencyy) + " " + item?.price }}</span>
            </div>
        </div>
        <ApexChart
            :id="`revenue-chart-${index}`" :ref="`revenue-chart-${index}`"
            :height="getSparkConfig(data)?.chart.height"
            :type="getSparkConfig(data)?.chart.type"
            :series="getSparkConfig(data)?.series"
            :options="getSparkConfig(data)"
            :currency="getSparkConfig(data)?.currency"
        >
        </ApexChart>
    </div>
</template>

<style lang="scss">
.vue-apexcharts {
    direction: ltr;
}

.apexcharts-yaxis {
    display: none !important;
}

html[dir="rtl"] {
    .apexcharts-title-text {
        font-family: Cairo, serif !important;
    }
}

.apexcharts-title-text {
    font-size: 16px;
}

.apexcharts-subtitle-text {
    font-size: 20px;
}
</style>
