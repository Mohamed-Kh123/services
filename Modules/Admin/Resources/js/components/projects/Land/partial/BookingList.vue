<script>
import {defineComponent} from 'vue'
import Empty from "../../../common/Empty.vue";

export default defineComponent({
    name: "BookingList",
    components: {Empty},
    props: {
        row: {},
        bookings: [],
        loading: false
    },
    data() {
        return {
            columns: [
                'customer_name',
                'employee_name',
                'status_label',
                'date',
                'time',
            ]
        }
    },
    methods: {
        $get: (...args) => _.get(...args),
        statusLabel(status) {
            switch (status) {
                case 'secondary':
                    return 'is-purple';
                case 'danger':
                    return 'is-danger'
                default:
                    return 'is-green'
            }
        }
    }
})
</script>

<template>
    <div class="flex-table-land is-rounded scroll">
        <!--Table header-->
        <div class="flex-table-land-header">
            <span v-for="column in columns">{{ trans(column) }}</span>
        </div>

        <!--Table item-->
        <div v-if="bookings?.length && !loading" class="flex-table-land-item" v-for="booking in bookings">
            <div class="flex-table-land-cell cell-center" data-th="customer_name">
                <VIconBox color="green">
                    <i aria-hidden="true" class="lnil lnil-user-alt"></i>
                </VIconBox>
                <span class="light-text mx-2">{{ $get(booking, 'customer_name') }}</span>
            </div>
            <div class="flex-table-land-cell cell-center" data-th="employee_name">
                <span class="light-text">{{ $get(booking, 'employee_name') }}</span>
            </div>
            <div class="flex-table-cell is-relative" data-th="status_label"><small
                class="tag is-rounded" :class="statusLabel($get(booking, 'status.value.class'))">{{ trans($get(booking, 'status.name')) }}</small>
            </div>
            <div class="flex-table-land-cell cell-center" data-th="date">
                <span class="light-text">{{ $get(booking, 'date') }}</span>
            </div>
            <div class="flex-table-land-cell cell-center" data-th="time">
                <span class="light-text">{{ $get(booking, 'time') }}</span>
            </div>
        </div>
        <div v-else v-if="!loading">
            <Empty/>
        </div>
    </div>
    <!--    <div class="dashboard-title">-->
    <!--        <div class="left">-->
    <!--            <h2 class="dark-inverted">{{ trans('booking_list') }}</h2>-->
    <!--            <p class="h-hidden-mobile">{{ trans('booking_list_desc') }}</p>-->
    <!--        </div>-->
    <!--        <div class="right">-->
    <!--            <div class="field">-->
    <!--                <div class="control has-icon">-->
    <!--                    <input-->
    <!--                        type="text"-->
    <!--                        class="input is-rounded"-->
    <!--                        placeholder="Search students..."-->
    <!--                    />-->
    <!--                    <div class="form-icon">-->
    <!--                        <i-->
    <!--                            aria-hidden="true"-->
    <!--                            class="iconify"-->
    <!--                            data-icon="feather:search"-->
    <!--                        ></i>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    &lt;!&ndash;Table&ndash;&gt;-->
    <!--    <div class="flex-table">-->
    <!--        &lt;!&ndash;Table item&ndash;&gt;-->
    <!--        <div-->
    <!--            v-for="booking in bookings"-->
    <!--            :key="booking.id"-->
    <!--            class="flex-table-item"-->
    <!--        >-->
    <!--            <div v-for="column in columns" class="flex-table-cell"-->
    <!--                 :data-th="$get(booking, column)">-->
    <!--                <div v-if="$get(booking, `${column}.name`)" class="flex-table-cell" :data-th="$get(booking, `${column}.name`)">-->
    <!--                  <span-->
    <!--                      class="tag is-rounded"-->
    <!--                      :class="statusLabel($get(booking, `${column}.value.class`))"-->
    <!--                  >{{ $get(booking, `${column}.name`) }}</span-->
    <!--                  >-->
    <!--                </div>-->
    <!--                <span v-else class="light-text">{{ $get(booking, column) }}</span>-->
    <!--            </div>-->

    <!--        </div>-->
    <!--    </div>-->
</template>

<style scoped>
.flex-table-land-cell.is-user > div span:not(.avatar), .flex-table-land-cell.is-media > div span:not(.avatar) {
    display: block;
    margin-inline-start: 10px;
}

.flex-table-land-cell.is-user > div .item-name, .flex-table-land-cell.is-media > div .item-name {
    font-family: var(--font-alt);
    font-size: .9rem;
    font-weight: 600;
    color: var(--dark);
}

.flex-table-land-cell.is-user > div span:not(.avatar), .flex-table-land-cell.is-media > div span:not(.avatar) {
    display: block;
    margin-inline-start: 10px;
}

span {
    font-style: inherit;
    font-weight: inherit;
}

.flex-table-land-cell.is-user > div .item-meta, .flex-table-land-cell.is-media > div .item-meta {
    color: var(--light-text);
}

.flex-table-land-cell.is-user > div, .flex-table-land-cell.is-media > div {
    line-height: 1.2;
}

.flex-table-land .flex-table-land-header {
    display: flex;
    align-items: center;
    padding: 0 10px;
}

.is-rounded {
    border-radius: var(--radius);
}

.flex-table-land:not(.is-compact).is-rounded .flex-table-land-item {
    border-radius: 8px;
}

.flex-table-land .flex-table-land-item {
    display: flex !important;
    align-items: stretch !important;
    width: 100%;
    min-height: 60px;
    background: var(--white);
    border: 1px solid var(--fade-grey-dark-3);
    padding: 8px;
    margin-bottom: 6px;
}

.flex-table-land-cell.is-user, .flex-table-land-cell.is-media {
    padding-inline-start: 0;
}

.flex-table-land-cell.is-grow-lg {
    flex-grow: 3;
}

.flex-table-land-cell {
    flex: 1 1 0;
    display: flex;
    align-items: center;
    padding: 0 10px;
    font-family: var(--font);
    word-break: keep-all;
    white-space: nowrap;
    text-align: inset-inline-start;
}

.flex-table-land .flex-table-land-header > span.is-grow-lg, .flex-table-land .flex-table-land-header .text.is-grow-lg {
    flex-grow: 3;
}

.flex-table-land .flex-table-land-header > span.cell-center, .flex-table-land .flex-table-land-header .text.cell-center {
    justify-content: center;
}

.flex-table-land .flex-table-land-header > span, .flex-table-land .flex-table-land-header .text {
    flex: 1 1 0;
    display: flex;
    align-items: center;
    font-size: .8rem;
    font-weight: 600;
    color: var(--muted-grey);
    text-transform: uppercase;
    padding: 0 10px 10px;
}

.scroll{
    overflow-x: scroll;
}
</style>
