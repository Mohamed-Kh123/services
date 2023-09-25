<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "DialogHeader",
    props : {
        land_statistics : [],
        specifications : [],
    }
})
</script>

<template>
    <div class="columns is-multiline p-4">
        <!--Card-->
        <div class="column is-4">
            <div class="calendar-widget widget">
                <div class="calendar-widget-inner">
                    <div v-for="(value,key) in land_statistics" class="calendar-square">
                        <div class="date">
                            <span>{{ trans(key) }}</span>
                            <span>{{ getValueByLocale(value) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-4">
            <div class="widget tags-widget">
                <div class="widget-toolbar">
                    <div class="left"><h3>{{ trans('land_specifications') }}</h3></div>
                    <div class="right">

                    </div>
                </div>
                <div class="widget-content">
                    <div class="tags">
                        <small v-for="(specification,key) in specifications"
                               :key="specification.id" class="tag is-primary is-curved is-outlined">
                            {{getValueByLocale(specification.description)}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
