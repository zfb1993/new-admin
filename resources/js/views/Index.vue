<template>
    <router-view></router-view>
</template>

<script>
    export default {
        name: "Index",
        mounted() {
            if (localStorage.Token == null){
                this.$router.push({
                    path: "login",
                });
            }
        }
    }
</script>

<style scoped>
</style>
