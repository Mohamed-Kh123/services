<!--<template>-->
<!--<VList v-bind="list"></VList>-->
<!--</template>-->

<!--<script type="text/x-template" id="hello-world-template">-->
<!--&lt;!&ndash;<p>Hello hello hello</p>&ndash;&gt;-->
<!--<VList v-bind="list"></VList>-->
<!--</script>-->
<!--<template id="hello-world-template">-->
<!--<VList v-bind="list"></VList>-->
<!--</template>-->

<script>
    import * as list from "./partials/list";

    export default {
        name: "List",
        template: "<VList v-bind=\"list\"> </VList>",
        data() {
            return {
                list,
            }
        }
    }
</script>

<style scoped>

</style>