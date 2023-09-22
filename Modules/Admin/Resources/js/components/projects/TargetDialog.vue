<script>
import {defineComponent} from 'vue'
import {GDialog} from 'gitart-vue-dialog';
import Empty from "../common/Empty.vue";
import charts from "../common/Charts.vue";
import ProjectStatistics from '../common/Statistics.vue'
import LandDialog from "./Land/Dialog.vue";
import LandStatistics from "./show/LandStatistics.vue";
import * as targetBookings from '../../pages/project/partials/target-bookings'

export default defineComponent({
    name: "Dialog",
    data() {
        return {
            isDialogLoading: false,
            data: [],
            targetBookings
        }
    },
    props: {
        modelValue: Boolean,
        row: Object,
    },
    components: {
        LandStatistics,
        LandDialog,
        charts,
        // ChartsComponent,
        Empty,
        GDialog,
        ProjectStatistics
    },
    emits: ['update:modelValue'],
    methods: {
        fetch() {
            this.isDialogLoading = true;
            this.request(
                this.$endPoint("project_targets.show", this.row.id),
                {},
                ({data}) => {
                    this.data = data.data;
                },
                (xhr) => {
                    this.errorNotify(xhr.data?.message ?? "")
                },
                () => {
                    this.isDialogLoading = false;
                }
            );
        },
    },
    computed: {
        isDisplayed: {
            set(newValue) {
                this.$emit('update:modelValue', newValue);
            },
            get() {
                return this.modelValue;
            }
        },
        charts() {
            return _.get(this.data, 'charts', [])
        },
        customFetchBookingEndPoint() {
            return this.$endPoint(`project_targets.bookings`, this.row.id);
        }
    },
    watch: {
        modelValue: {
            handler(newValue) {
                if (newValue) {
                    this.fetch();
                    window.Bus.emit(`reload-table-${targetBookings.resource}`);
                }
            }
        }
    }
})
</script>

<template>
    <GDialog v-model="isDisplayed" class="land-dialog-container" fullscreen>
        <VLoader size="small" :active="isDialogLoading">

            <div class="project-details">

                <div class="tabs-wrapper is-triple-slider">

                    <div class="project-details-inner px-4">
                        <div class="close-btn mb-4">
                            <VIconButton color="danger" outlined darkOutlined light raised circle icon="lnil lnil-close"
                                         @click="isDisplayed = false"/>
                        </div>
                        <div class="finance-dashboard analytics-dashboard">
                            <div class="columns is-multiline">
                                <div class="column is-12">
                                    <div class="columns is-multiline">
                                        <ProjectStatistics :statistics="data.statistics"/>

                                        <charts :charts="charts"/>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <VList v-bind="targetBookings"
                                           :customFetchEndPoint="customFetchBookingEndPoint"></VList>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </VLoader>
    </GDialog>
</template>

<style lang="scss">
@import 'nawadash/src/scss/abstracts/_mixins.scss';
@import 'nawadash/src/scss/pages/generic/_widgets-lists.scss';

.analytics-dashboard {
    .text-h-green {
        color: var(--green);
    }

    .text-h-red {
        color: var(--red);
    }

    .text-widget {
        color: var(--widget-grey);
    }

    .dashboard-tile {
        @include vuero-s-card();

        font-family: var(--font);

        .tile-head {
            display: flex;
            align-items: center;
            justify-content: space-between;

            h3 {
                font-family: var(--font-alt);
                color: var(--dark-text);
                font-weight: 600;
            }
        }

        .tile-body {
            font-size: 2rem;
            padding: 4px 0 8px 0;

            span {
                color: var(--dark-text);
                font-weight: 600;
            }
        }

        .tile-foot {
            span {
                &:first-child {
                    font-weight: 500;

                    svg {
                        height: 16px;
                        width: 16px;
                        margin-right: 6px;
                        stroke-width: 3px;
                    }
                }

                &:nth-child(2) {
                    color: var(--light-text);
                    font-size: 0.9rem;
                }
            }
        }
    }

    .dashboard-card {
        @include vuero-s-card();

        font-family: var(--font);
        height: 100%;

        .card-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;

            h3 {
                font-family: var(--font-alt);
                font-size: 1rem;
                font-weight: 600;
                color: var(--dark-text);
            }
        }

        .revenue-stats {
            display: flex;

            .revenue-stat {
                margin-right: 30px;
                font-family: var(--font);

                span {
                    display: block;

                    &:first-child {
                        color: var(--light-text);
                        font-size: 0.9rem;
                    }

                    &:nth-child(2) {
                        color: var(--dark-text);
                        font-size: 1.2rem;
                        font-weight: 600;
                    }

                    &.current {
                        color: var(--primary);
                    }
                }
            }
        }

        .radial-wrap {
            display: flex;
            flex-direction: column;
            height: calc(100% - 44px);

            .radial-stats {
                margin-top: auto;
                display: flex;
                padding-top: 20px;
                border-top: 1px solid var(--fade-grey-dark-3);

                .radial-stat {
                    width: 50%;
                    text-align: center;

                    &:first-child {
                        border-right: 1px solid var(--fade-grey-dark-3);
                    }

                    span {
                        display: block;

                        &:first-child {
                            color: var(--light-text);
                            font-size: 0.9rem;
                        }

                        &:nth-child(2) {
                            color: var(--dark-text);
                            font-size: 1.3rem;
                            font-weight: 600;
                        }
                    }
                }
            }
        }

        .progress-block {
            display: flex;
            flex-direction: column;
            height: calc(100% - 44px);
            font-family: var(--font);

            .value {
                font-size: 1.4rem;
                font-weight: 600;

                span {
                    color: var(--dark-text);
                }
            }

            .progress {
                margin-bottom: 8px;
            }

            .progress-foot {
                span {
                    &:first-child {
                        font-weight: 500;

                        svg {
                            height: 16px;
                            width: 16px;
                            margin-right: 6px;
                            stroke-width: 3px;
                        }
                    }

                    &:nth-child(2) {
                        color: var(--light-text);
                        font-size: 0.9rem;
                    }
                }
            }

            .circle-chart-wrapper {
                margin-top: auto;
            }
        }
    }
}

.is-dark {
    .analytics-dashboard {
        .dashboard-tile,
        .dashboard-card {
            @include vuero-card--dark();
        }
    }
}
</style>
