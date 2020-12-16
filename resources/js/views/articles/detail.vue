<template>
    <Row>
        <Form model="formItem" :label-width="80">
            <Col :span="12">
                    <FormItem label="文章标题">
                        <Input v-model="article.title" placeholder="文章标题"></Input>
                    </FormItem>

            </Col>
            <Col :span="16">
                <FormItem label="文章内容">
                    <mavon-editor v-model="article.content" ref="editor" @imgAdd="$imgAdd" @save="markDownSub"></mavon-editor>
                </FormItem>
            </Col>
        </Form>
    </Row>
</template>

<script>
    export default {
        name: "detail",
        data(){
            return {
                article: {
                    title: '',
                    content: ''
                }
            }
        },
        methods:{
            markDownSub(){
                this.$refs.ruleForm.validate(validate=>{
                    if(validate){
                        let data = {
                            title:this.title,
                            content: this.value
                        }
                        this.$api.postArticle(data).then(res=>{
                            if(res.stauts == 200){
                                this.$message({
                                    message: '发布成功~',
                                    type: 'success'
                                });
                            }
                        })
                    }else{
                        console.log('error submit!!');
                        return false;
                    }
                })
            },
            $imgAdd(pos, $file) {
                // 第一步.将图片上传到服务器.
                var formdata = new FormData();
                formdata.append('chatu', $file);
                this.$api.uploadImage(formdata).then(url => {
                    console.log(url.data)
                    this.$refs.editor.$img2Url(pos, baseUrl + '/storage/' + url.data)
                })
                // axios({
                //     url: 'server url',
                //     method: 'post',
                //     data: formdata,
                //     headers: { 'Content-Type': 'multipart/form-data' },
                // }).then((url) => {
                //     // 第二步.将返回的url替换到文本原位置![...](./0) -> ![...](url)
                //     /**
                //      * $vm 指为mavonEditor实例，可以通过如下两种方式获取
                //      * 1. 通过引入对象获取: `import {mavonEditor} from ...` 等方式引入后，`$vm`为`mavonEditor`
                //      * 2. 通过$refs获取: html声明ref : `<mavon-editor ref=md ></mavon-editor>，`$vm`为 `this.$refs.md`
                //      */
                //     $vm.$img2Url(pos, url);
                // })
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
