<template>
<div>
    <h1 ref="myRef">Hookiehooks</h1>
    <p>my name is {{name}}</p>
</div>
</template>

<script>
    export default {
        data() {
            return {
                name: 'Taloes'
            }
        },

        beforeCreate() {
            console.log(this.name)
        },
        created() {
            //cal mostly initial data
            console.log('data and other function is available but not html', this.name)
        },
        mounted() {
            console.log(this.$refs.myRef.innerHTML)
        }
    }
</script>

<style scoped>

</style>
