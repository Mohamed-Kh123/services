<script>
import {defineComponent} from 'vue'

export default defineComponent({
    name: "Card",
    data() {
        return {
            actions: [
                {
                    slug: "delete",
                    color: "danger",
                    icon: "fa fa-trash",
                },
                {
                    slug: "edit",
                    color: "info",
                    icon: "fa fa-edit",
                },
            ],
        }
    },
    props: {
        project: {}
    },
    methods: {
        actionClicked(slug, row) {
            this.$emit('action', slug, row)
        },
    }
})
</script>

<template>
    <div class="onboarding-wrap-inner is-raised">
        <div class="action-card">
            <div v-for="(action , index) in actions">
                <VIconButton @click="actionClicked(action.slug,project)" :color="action.color"
                             light raised circle :icon="action.icon"/>
            </div>

        </div>
        <!--Card-->
        <div class="onboarding-card">

            <img
                class="light-image"
                :src="project?.logo_url ?? `/panel/assets/illustrations/onboarding/set4-1.svg`"
                alt=""
            />
            <img
                class="dark-image"
                :src="project?.logo_url ?? `/panel/assets/illustrations/onboarding/set6-1-dark.svg`"
                alt=""
            />
            <h3>{{ getValueByLocale(project?.name) }}</h3>
            <p>{{ getValueByLocale(project?.description) }}</p>

            <div class="button-wrap">
<!--                <VButton class="is-6" color="success" icon="fas fa-eye" raised-->
<!--                         @click="$router.push({name: `project.show`, params: {id: project.id}})">{{ $t('statistics_project') }}-->
<!--                </VButton>-->

                <VButton  class="is-6" color="info" icon="fas fa-eye" raised
                         @click="$router.push({name: `project.profile-wallet-transaction`, params: {id: project.id}})">{{ $t('show_project') }}
                </VButton>
            </div>
        </div>
        <!--Card-->
    </div>
</template>

<style lang="scss">
.standard-onboarding .onboarding-wrap .onboarding-wrap-inner{
    height: 100%;
    .onboarding-card{
        img{
            height: 140px;
        }
    }
}
</style>
