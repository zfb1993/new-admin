<template>
    <div>
        <CheckboxGroup v-model="tagIds" @on-change="passVal">
            <Checkbox :label="tag.id"
                      v-for="(tag,index) in tags"
                      :key="index">
                <span>{{tag.name}}</span>
            </Checkbox>
        </CheckboxGroup>
    </div>
</template>

<script>
    import api from "../../axios/http";

    export default {
        props:{
            checkedTags:null,
        },
        name: "tagCheck",
        data(){
            return {
                tags:[],
                tagIds:[],
            }
        },
        methods:{
            getList(){
                api.getTags().then(res=>{
                    this.tags = res.data
                    console.log(res.data)
                });
            },
            passVal(){
                this.$emit('getTagIds', this.tagIds)
            }
        },
        mounted() {
            this.getList()
        },
        watch:{
            checkedTags(value){
                this.tagIds = value
            }
        }
    }
</script>

<style scoped>

</style>
