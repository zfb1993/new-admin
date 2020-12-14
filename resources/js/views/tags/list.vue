<template>
    <div>
        <div class="m10">
            <Button type="primary" @click="getList">刷新</Button>
            <Button type="success" @click="getList">新增</Button>
        </div>
        <Table border :columns="columns" :data="data" :loading="loading"></Table>
        <Modal
            v-model="modalShow"
            title="编辑"
            @on-ok="edit"
            @on-cancel="cancel">
            <Form :model="formItem" :label-width="80">
                <FormItem label="标签名">
                    <Input v-model="formItem.name" placeholder="请填写标签名"></Input>
                </FormItem>
            </Form>
        </Modal>
        <Modal
            v-model="addShow"
            title="新增"
            @on-ok="add"
            @on-cancel="cancel">
            <Form :model="formItem" :label-width="80">
                <FormItem label="标签名">
                    <Input v-model="formItem.name" placeholder="请填写标签名"></Input>
                </FormItem>
            </Form>
        </Modal>
    </div>
</template>

<script>
    import api from '../../axios/http.js'
    export default {
        name: "categoryList",
        data () {
            return {
                loading: false,
                modalShow: false,
                modalTitle: '',
                addShow: false,
                formItem:{
                    name:''
                },
                columns: [
                    {
                        title: 'id',
                        key: 'id',
                    },
                    {
                        title: '标签名',
                        key: 'name'
                    },
                    {
                        title: '创建时间',
                        key: 'created_at'
                    },
                    {
                        title: '修改时间',
                        key: 'updated_at'
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
                                            this.show(params)
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
                                            this.remove(params.index)
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
        methods: {
            show (param) {
                this.modalShow = true
                this.modalTitle = '编辑'
                this.formItem.name = param.row.name
            },
            remove (index) {

            },
            getList(){
                this.loading = true
                api.getTags().then(res=>{
                    this.data = res.data.data
                    this.loading = false
                });
            },
            edit(){

            },
            add(){

            },
            cancel(){

            }
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
