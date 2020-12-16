<template>
    <div>
        <CheckboxGroup v-model="tags">
            <Checkbox :label="tag.name" v-for="(tag,index) in tags" :key="index"></Checkbox>
        </CheckboxGroup>
    </div>
</template>

<script>
    import api from "../../axios/http";

    export default {
        props:{

        },
        name: "tagCheck",
        data(){
            return {
                tags:[]
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
            this.getList()
        }
    }
</script>

<style scoped>

</style>
