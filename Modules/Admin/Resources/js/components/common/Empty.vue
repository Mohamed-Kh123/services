<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "Empty"
})
</script>

<template>
    <div class="search-results-body">
        <!--Search Placeholder -->
        <div class="page-placeholder">
            <div class="placeholder-content">
                <img
                    class="light-image"
                    src="/panel/assets/illustrations/placeholders/search-7.svg"
                    alt=""
                />
                <img
                    class="dark-image"
                    src="/panel/assets/illustrations/placeholders/search-7-dark.svg"
                    alt=""
                />
                <h3>{{ trans('datatable.no_results') }}</h3>
                <p class="is-larger">
                    {{ trans('datatable.no_results_subtitle') }}
                </p>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
