<template>
    <div>
        <CheckboxGroup v-model="tags">
            <Checkbox :label="tag.name" v-for="(tag,index) in tags" :key="index"></Checkbox>
        </CheckboxGroup>
    </div>
</template>

<script>
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
                
            }
        }
    }
</script>

<style scoped>

</style>
