<template>
    <VButton
        v-if="isShow"
        style="font-size:14px;margin:0 10px"
        @click="onClick"
        color="info"
        raised
        ref="buttonFiled">
        {{ $t(label) }}
    </VButton>
</template>

<script>
import input from "nawadash/src/components/formBuilder/mixins/input";
export default {
    name: "ButtonField",
    mixins: [input],
    props: {
        onClickCallback: Function,
        showCallback: Function,
        label: String,
    },
    data() {
        return {}
    },
    created() {

    },
    methods: {
        onClick(...args) {
            if (this.onClickCallback instanceof Function)
                this.onClickCallback.bind(this)(...args);
        },
    },
    computed: {
        isShow() {
            console.log('this.isEditthis.isEdit',this.isEdit)
            if (this.showCallback instanceof Function) return this.showCallback(this.isEdit);
            return true;
        }
    }
}
</script>

<style scoped>

</style>
