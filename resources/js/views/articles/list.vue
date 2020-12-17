<template>
    <div>
        <div class="m10">
            <Button type="primary" @click="getList">刷新</Button>
        </div>
        <Table border :columns="columns" :data="data" :loading="loading"></Table>
    </div>
</template>

<script>
    import api from '../../axios/http.js'
    export default {
        name: "ArticleList",
        data () {
            return {
                loading: false,
                columns: [
                    {
                        title: 'id',
                        key: 'id',
                    },
                    {
                        title: '标题',
                        key: 'title',
                    },
                    {
                        title: '分类',
                        key: 'category_name',
                        render: (h, {row}) => {
                            let categories = this.$store.state.Categories
                            let categoryName = ''
                            categories.map(item=>{
                                if(item.id == row.category_id){
                                    categoryName = item.name
                                }
                            })
                            return h('div',categoryName)
                        }
                    },
                    {
                        title: '标签',
                        key: 'tag_id',
                        render:(h,{row})=>{
                            let tags = this.$store.state.Tags
                            let tagNames = []
                            tags.map(item=>{
                                if (in_array(item.id,row.tag_id)){
                                    tagNames.push(item.name)
                                }
                            })
                            return h('div',tagNames.join(','))
                        }
                    },
                    {
                        title: '创建时间',
                        key: 'created_at'
                    },
                    {
                        title: '修改时间',
                        key: 'updated_at',
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 150,
                        align: 'center',
                        render: (h, params) => {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary',
                                        size: 'small'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: () => {

                                        }
                                    }
                                }, '编辑'),
                                h('Button', {
                                    props: {
                                        type: 'error',
                                        size: 'small'
                                    },
                                    on: {
                                        click: () => {
                                            this.remove(params)
                                        }
                                    }
                                }, '删除')
                            ]);
                        }
                    }
                ],
                data: []
            }
        },
        methods:{
            remove (param) {
                this.$Modal.confirm({
                    title: '删除',
                    content: '确定要删除么？',
                    onOk: () => {
                        let data = {id:param.row.id}
                        api.deleteCategory(data).then(res=>{
                            if(res.data.state == 0){
                                this.$Message.success('删除成功');
                                this.getList()
                            }
                        })
                    },
                    onCancel: () => {

                    }
                });
            },
            getList(){
                this.loading = true
                let data = {isPage:true}
                api.getArticles(data).then(res=>{
                    this.data = res.data.data
                    this.loading = false
                    this.$Message.success('刷新成功');
                });
            },
        },
        mounted() {
            this.getList()
        }
    }
</script>

<style scoped>
    .m10{
        margin-bottom: 10px;
    }
</style>
