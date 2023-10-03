<!--<template>-->
<!--<div>-->
<!--show -->
<!--</div>-->
<!--</template>-->

<script>
    export default {
        name: "Show",
        template: "<Sortable resource='category' :rows='rows' @updated='onUpdate' :loading='loading'></Sortable>",
        data() {
            return {
                loading: true,
                rows: [
                    {
                        id: 1,
                        name: "Wesam jibreen",
                    },
                    {
                        id: 2,
                        name: "Emad harara"
                    },
                    {
                        id: 3,
                        name: "Asad Erheem"
                    },
                    {
                        id: 4,
                        name: "BolBol"
                    }
                ]
            }
        },
        created() {
            setTimeout(() => {
                this.loading = false
            }, 3000);
        },
        methods: {
            onUpdate(...args) {
                console.log('onUpdate',...args)
            }
        }
    }
</script>

<style scoped>

</style>