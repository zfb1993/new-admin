<template>
    <div>
        <Select v-model="category" style="width:200px">
            <Option v-for="(category,index)in categories" :value="category.id" :key="index">{{ category.name }}</Option>
        </Select>
    </div>
</template>

<script>
    import api from "../../axios/http";

    export default {
        name: "categorySelect",
        data(){
            return {
                categories: [],
                category: null,
            }
        },
        methods:{
            getList(){
                api.getTags().then(res=>{
                    this.tags = res.data.data
                });
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
