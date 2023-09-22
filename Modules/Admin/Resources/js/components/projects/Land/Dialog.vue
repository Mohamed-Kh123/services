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
                        <div class="columns is-multiline" v-if="!isDialogLoading">
                            <div class="column is-12">
                                <Statistics :data="data.land_statistics"/>
                            </div>
                            <div class="column is-9">
                                <BookingList :bookings="data.bookings" :loading="isDialogLoading"/>
                            </div>
                            <div class="column is-3">
                                <div class="side-card">
                                    <h4>{{ trans('land_specifications') }}</h4>

                                    <div v-if="data?.specifications?.length && !isDialogLoading" class="tags">
                                        <small v-for="(specification,key) in data.specifications"
                                               :key="specification.id"
                                               class="tag mx-1 is-primary is-curved is-outlined">
                                            {{ getValueByLocale(specification.description) }}</small>
                                    </div>

                                </div>
                                <div class="project-details-card">
                                    <div class="project-files">
                                        <h4>{{ trans('files_title') }}</h4>
                                        <div class="columns is-multiline">
                                            <div v-if="data?.files?.length" v-for="file in data.files" :key="file.id"
                                                 class="column is-12" @click="downloadFile(file.url)">
                                                <div class="file-box">
                                                    <img :src="file?.icon" alt=""/>
                                                    <div class="meta px-5">
                                                        <span>{{ file.file_name }}</span>
                                                        <span>
                                                      {{ trans('uploaded_date') }} {{ file.uploaded_date }} <i
                                                            aria-hidden="true"
                                                            class="fas fa-circle"></i> {{ file.file_size }}
                                                    </span>
                                                    </div>

                                                </div>
                                            </div>
<!--                                            <Empty v-else style="flex: auto"/>-->
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--                        <div class="columns is-multiline" v-if="!isDialogLoading">-->
                        <!--                            <div class="column is-6">-->
                        <!--                                <div class="project-details-card">-->
                        <!--                                    <div class="project-features">-->
                        <!--                                        <div v-for="(value,key) in data.land_statistics" class="project-feature">-->
                        <!--                                            <i aria-hidden="true" :class="value?.icon ?? 'lnil lnil-vector-pen'"></i>-->
                        <!--                                            <h4>{{ trans(key) }}</h4>-->
                        <!--                                            <p>-->
                        <!--                                                {{ getValueByLocale(value) }}-->
                        <!--                                            </p>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->

                        <!--                                    <div class="project-files">-->
                        <!--                                        <h4>{{ trans('files_title') }}</h4>-->
                        <!--                                        <div class="columns is-multiline">-->
                        <!--                                            <div v-if="data?.files?.length" v-for="file in data.files" :key="file.id"-->
                        <!--                                                 class="column is-6" @click="downloadFile(file.url)">-->
                        <!--                                                <div class="file-box">-->
                        <!--                                                    <img :src="file?.icon" alt=""/>-->
                        <!--                                                    <div class="meta">-->
                        <!--                                                        <span>{{ file.file_name }}</span>-->
                        <!--                                                        <span>-->
                        <!--                                                      {{ trans('uploaded_date') }} {{ file.uploaded_date }} <i-->
                        <!--                                                            aria-hidden="true"-->
                        <!--                                                            class="fas fa-circle"></i> {{ file.file_size }}-->
                        <!--                                                    </span>-->
                        <!--                                                    </div>-->

                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                            <Empty v-else style="flex: auto"/>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->

                        <!--                            <div class="column is-6">-->
                        <!--                                <div class="side-card">-->
                        <!--                                    <h4>{{ trans('land_specifications') }}</h4>-->

                        <!--                                    <div v-if="data?.specifications?.length && !isDialogLoading" class="tags">-->
                        <!--                                        <small v-for="(specification,key) in data.specifications"-->
                        <!--                                               :key="specification.id" class="tag mx-1 is-primary is-curved is-outlined">-->
                        <!--                                            {{ getValueByLocale(specification.description) }}</small>-->
                        <!--                                    </div>-->
                        <!--                                    <Empty v-else/>-->
                        <!--                                </div>-->
                        <!--                                <BookingList :bookings="data.bookings" :loading="isDialogLoading"/>-->

                        <!--                            </div>-->
                        <!--                        </div>-->

                    </div>
                </div>
            </div>
            <!--            <div class="business-dashboard course-dashboard p-5">-->
            <!--                <div class="close-btn">-->
            <!--                    <VIconButton color="danger" outlined darkOutlined light raised circle icon="lnil lnil-close" @click="isDisplayed = false"/>-->
            <!--                </div>-->

            <!--                <div class="dialog-container">-->

            <!--                    <DialogHeader v-bind="data"/>-->
            <!--                    &lt;!&ndash;Tile Grid v1&ndash;&gt;-->
            <!--                    <div class="columns is-multiline tile-grid tile-grid-v2">-->

            <!--                        &lt;!&ndash;Grid item&ndash;&gt;-->
            <!--                        <div class="column is-4">-->
            <!--                            <div class="dashboard-title">-->
            <!--                                <div class="left">-->
            <!--                                    <h2 class="dark-inverted">{{ trans('files_title') }}</h2>-->
            <!--                                    <p class="h-hidden-mobile">{{ trans('files_title_desc') }}</p>-->
            <!--                                </div>-->
            <!--                            </div>-->

            <!--                            <div v-for="file in data.files" :key="file.id" class="tile-grid-item" @click="downloadFile(file.url)">-->
            <!--                                <div class="tile-grid-item-inner">-->
            <!--                                    <img :src="file.icon" alt=""/>-->
            <!--                                    <div class="meta">-->
            <!--                                        <span class="dark-inverted">{{ file.file_name }}</span>-->
            <!--                                        <span>-->
            <!--                                        <span>{{ file.file_size }}</span>-->
            <!--                                        <i aria-hidden="true" class="fas fa-circle icon-separator"></i>-->
            <!--                                        <span>{{ trans('uploaded_date') }} {{ file.uploaded_date }}</span>-->
            <!--                                      </span>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->

            <!--                        &lt;!&ndash;Grid item&ndash;&gt;-->
            <!--                        <div class="column is-8">-->
            <!--                            <BookingList :bookings="data.bookings"/>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </VLoader>
    </GDialog>
</template>


<script>
import {defineComponent} from 'vue'
import {GDialog} from 'gitart-vue-dialog';
import BookingList from "./partial/BookingList.vue";
import DialogHeader from "./partial/DialogHeader.vue";
import Empty from '../../common/Empty.vue'
import Statistics from './partial/Statistics.vue'

export default defineComponent({
    name: "Dialog",
    data() {
        return {
            isDialogLoading: false,
            data: [],
        }
    },
    props: {
        modelValue: Boolean,
        row: Object,
    },
    components: {
        DialogHeader,
        BookingList,
        GDialog,
        Empty,
        Statistics
    },
    emits: ['update:modelValue'],
    methods: {
        fetch() {
            this.isDialogLoading = true;
            this.request(
                this.$endPoint("lands.show", this.row.id),
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
        downloadFile(file_url) {
            if (!file_url)
                return;

            window.open(file_url, '_blank')
        }
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
    },
    watch: {
        modelValue: {
            handler(newValue) {
                if (newValue) this.fetch();
            }
        }
    }
})
</script>


<style lang="scss">
@import 'nawadash/src/scss/abstracts/_mixins.scss';

/* ==========================================================================
1. Project Details
========================================================================== */
.text-start {
    text-align: start;
}

.project-details-inner {
    background: var(--background-grey);
}

.is-navbar {
    .project-details {
        padding-top: 30px;
    }
}

.project-details {
    .tabs-wrapper {
        .tabs-inner {
            .tabs {
                margin: 0 auto;
                background: var(--white);
            }
        }
    }

    .project-details-inner {
        padding: 20px 0;
        min-height: 100vh;

        .project-details-card {
            @include vuero-s-card();

            padding: 40px;

            .card-head {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;

                .title-wrap {
                    h3 {
                        font-family: var(--font-alt);
                        font-size: 1.5rem;
                        font-weight: 700;
                        color: var(--dark-text);
                        line-height: 1.2;
                        transition: all 0.3s;
                    }
                }
            }

            .project-overview {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 0;

                p {
                    max-width: 420px;
                }
            }

            .project-features {
                display: flex;
                padding: 25px 0;
                border-top: 1px solid var(--fade-grey-dark-3);
                border-bottom: 1px solid var(--fade-grey-dark-3);

                .project-feature {
                    margin-right: 20px;
                    width: calc(25% - 20px);

                    i {
                        font-size: 1.6rem;
                        color: var(--primary);
                        margin-bottom: 8px;
                    }

                    h4 {
                        font-family: var(--font-alt);
                        font-size: 0.85rem;
                        font-weight: 600;
                        color: var(--dark);
                    }

                    p {
                        line-height: 1.2;
                        font-size: 0.85rem;
                        color: var(--light-text);
                        margin-bottom: 0;
                    }
                }
            }

            .project-files {
                padding: 20px 0;

                h4 {
                    font-family: var(--font-alt);
                    font-weight: 600;
                    font-size: 0.8rem;
                    text-transform: uppercase;
                    color: var(--primary);
                    margin-bottom: 12px;
                }

                .file-box {
                    display: flex;
                    align-items: center;
                    padding: 8px;
                    background: var(--white);
                    border: 1px solid transparent;
                    border-radius: 12px;
                    cursor: pointer;
                    transition: all 0.3s;

                    &:hover {
                        border-color: var(--fade-grey-dark-3);
                        box-shadow: var(--light-box-shadow);
                    }

                    img {
                        display: block;
                        width: 48px;
                        min-width: 48px;
                        height: 48px;
                    }

                    .meta {
                        margin-left: 12px;
                        line-height: 1.3;

                        span {
                            display: block;

                            &:first-child {
                                font-family: var(--font-alt);
                                font-size: 0.9rem;
                                font-weight: 600;
                                color: var(--dark-text);
                            }

                            &:nth-child(2) {
                                font-size: 0.9rem;
                                color: var(--light-text);

                                i {
                                    position: relative;
                                    top: -3px;
                                    font-size: 0.3rem;
                                    color: var(--light-text);
                                    margin: 0 4px;
                                }
                            }
                        }
                    }

                    .dropdown {
                        margin-left: auto;
                    }
                }
            }
        }

        .side-card {
            @include vuero-s-card();
            margin-top: 30px;
            padding: 40px;
            margin-bottom: 1.5rem;

            h4 {
                font-family: var(--font-alt);
                font-weight: 600;
                font-size: 0.8rem;
                text-transform: uppercase;
                color: var(--primary);
                margin-bottom: 16px;
            }
        }

        .project-team-card {
            @include vuero-s-card();

            padding: 40px;
            max-width: 940px;
            display: block;
            margin: 0 auto;

            .column {
                padding: 1.5rem;

                &:nth-child(odd) {
                    border-right: 1px solid var(--fade-grey-dark-3);
                }

                &.has-border-bottom {
                    border-bottom: 1px solid var(--fade-grey-dark-3);
                }
            }
        }

        .task-grid {
            .grid-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;

                h3 {
                    font-family: var(--font-alt);
                    font-size: 1.5rem;
                    font-weight: 700;
                    color: var(--dark-text);
                    line-height: 1.2;
                }

                .filter {
                    display: flex;
                    align-items: center;
                    background: var(--white);
                    padding: 8px 24px;
                    border-radius: 100px;

                    > span {
                        font-family: var(--font-alt);
                        font-size: 0.85rem;
                        font-weight: 600;
                        color: var(--dark-text);
                        margin-right: 20px;
                    }

                    .multiselect {
                        min-width: 140px;

                        .multiselect-input {
                            border: none;
                        }
                    }
                }
            }

            .task-card {
                @include vuero-s-card();

                min-height: 200px;
                display: flex !important;
                flex-direction: column;
                justify-content: space-between;
                padding: 30px;
                cursor: pointer;
                transition: all 0.3s;

                &:hover {
                    transform: translateY(-5px);
                    box-shadow: var(--light-box-shadow);
                }

                .title-wrap {
                    h3 {
                        font-size: 1.1rem;
                        font-family: var(--font-alt);
                        font-weight: 600;
                        color: var(--dark-text);
                        line-height: 1.2;
                        margin-bottom: 4px;
                    }

                    span {
                        font-family: var(--font);
                        font-size: 0.9rem;
                        color: var(--light-text);
                    }
                }

                .content-wrap {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;

                    .left {
                        .avatar-stack {
                            margin-bottom: 6px;
                        }

                        .attachments {
                            display: flex;
                            align-items: center;

                            i {
                                font-size: 15px;
                                color: var(--light-text);
                            }

                            span {
                                margin-left: 2px;
                                font-size: 0.9rem;
                                font-family: var(--font);
                                color: var(--light-text);
                            }
                        }
                    }
                }
            }
        }
    }
}

/* ==========================================================================
2. Project Details Dark Mode
========================================================================== */

.is-dark {
    .project-details {
        .project-details-inner {
            .project-details-card {
                @include vuero-card--dark();

                .card-head {
                    .title-wrap {
                        h3 {
                            color: var(--dark-dark-text) !important;
                        }
                    }
                }

                .project-features {
                    border-color: var(--dark-sidebar-light-12);

                    .project-feature {
                        i {
                            color: var(--primary);
                        }

                        h4 {
                            color: var(--dark-dark-text);
                        }
                    }
                }

                .project-files {
                    h4 {
                        color: var(--primary);
                    }

                    .file-box {
                        background: var(--dark-sidebar-light-3);

                        &:hover {
                            border-color: var(--dark-sidebar-light-10);
                        }

                        .meta {
                            span {
                                &:first-child {
                                    color: var(--dark-dark-text);
                                }
                            }
                        }
                    }
                }
            }

            .side-card {
                @include vuero-card--dark();

                h4 {
                    color: var(--primary);
                }
            }

            .project-team-card {
                @include vuero-card--dark();

                .column {
                    border-color: var(--dark-sidebar-light-12);
                }
            }

            .task-grid {
                .grid-header {
                    h3 {
                        color: var(--dark-dark-text);
                    }

                    .filter {
                        background: var(--dark-sidebar-light-1) !important;
                        border-color: var(--dark-sidebar-light-4) !important;

                        > span {
                            color: var(--dark-dark-text);
                        }
                    }
                }

                .task-card {
                    @include vuero-card--dark();

                    .title-wrap {
                        h3 {
                            color: var(--dark-dark-text);
                        }
                    }
                }
            }
        }
    }
}

/* ==========================================================================
3. Media Queries
========================================================================== */

@media only screen and (max-width: 767px) {
    .project-details {
        .project-details-inner {
            .project-details-card {
                padding: 30px;

                .project-overview {
                    flex-direction: column;

                    p {
                        margin-bottom: 20px;
                    }
                }

                .project-features {
                    flex-wrap: wrap;

                    .project-feature {
                        width: calc(50% - 20px);
                        text-align: center;
                        margin: 0 10px;

                        &:first-child,
                        &:nth-child(2) {
                            margin-bottom: 20px;
                        }
                    }
                }
            }

            .project-team-card {
                padding: 30px;

                .column {
                    border-right: none !important;
                }
            }
        }
    }
}

@media only screen and (min-width: 768px) and (max-width: 1024px) and (orientation: portrait) {
    .project-details {
        .project-details-inner {
            .project-details-card {
                .project-files {
                    .columns {
                        display: flex;

                        .column {
                            min-width: 50%;
                        }
                    }
                }
            }

            .project-team-card {
                .columns {
                    display: flex;

                    .column {
                        min-width: 50%;
                    }
                }
            }

            .task-grid {
                .columns {
                    display: flex;

                    .column {
                        min-width: 50%;
                    }
                }
            }
        }
    }
}
</style>
