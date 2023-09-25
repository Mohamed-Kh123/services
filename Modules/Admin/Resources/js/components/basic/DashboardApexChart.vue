<template>
    <div v-for="(item, index) in data$" class="column" :class="`is-${item?.cols ?? 4}`">
        <div class="spark-tile">
<!--            :stats="item.stats"-->
<!--            <LineStatWidget :title="getValueByLocale(item.title)"-->
<!--                            straight>-->
                <ApexChart
                    :id="`spark${index}`"
                    :height="getSparkConfig(item, index).chart.height"
                    :type="getSparkConfig(item, index).chart.type"
                    :series="getSparkConfig(item, index).series"
                    :options="getSparkConfig(item, index)"
                >
                </ApexChart>
<!--            </LineStatWidget>-->
        </div>
    </div>
</template>

<script>
import ApexChart from 'vue3-apexcharts';
import {useThemeColors} from 'nawadash/src/composable/useThemeColors';
import {useI18n} from "vue-i18n";
import LineStatWidget from "nawadash/src/components/basic/dashboard/LineStatWidget.vue";

export default {
    name: "DashboardApexChart",
    components: {
        ApexChart,
        LineStatWidget
    },
    props: {
        data$: Object
    },
    data() {
        return {
            themeColors: useThemeColors(),
            locale: useI18n().locale,
        };
    },
    methods: {
        valueByLocale(value) {
            return _.get(value, this.locale.value ?? "ar", value);
        },
        getSparkConfig(item, index) {
            return {
                chart: {
                    id: 'sparkline1',
                    group: 'sparklines',
                    type: 'area',
                    height: 180,
                    sparkline: {
                        enabled: true,
                    },
                },
                colors: [item?.color ?? '#06D69EFF'],
                stroke: {
                    width: [2],
                    curve: 'straight',
                },
                fill: {
                    opacity: 1,
                },
                series: item.series,
                labels: item.labels,
                yaxis: {
                    min: 0,
                    labels: {
                        minWidth: 100,
                    },
                },
                xaxis: {
                    type: 'datetime',
                },
                title: {
                    text: item.title,
                    offsetX: 5,
                    style: {
                        fontSize: '18px',
                        cssClass: 'apexcharts-yaxis-title',
                        color: this.themeColors.lightText,
                    },
                },
                subtitle: {
                    text: item?.currency + " " + item?.subtitle,
                    offsetX: 5,
                    style: {
                        fontSize: '24px',
                        fontWeight: '600',
                        cssClass: 'apexcharts-yaxis-title',
                    },
                },
            };
        },
    },
};
</script>

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
