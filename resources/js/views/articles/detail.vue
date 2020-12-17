<template>
    <Row>
        <Form :model="article" :label-width="80">
            <Col :span="12">
                    <FormItem label="文章标题">
                        <Input v-model="article.title" placeholder="文章标题"></Input>
                    </FormItem>
            </Col>
            <Col :span="20">
                <FormItem label="文章内容">
                    <mavon-editor v-model="article.content" ref="editor" @imgAdd="$imgAdd" @save="markDownSub"></mavon-editor>
                </FormItem>
            </Col>
            <Col :span="20" style="text-align: right;">
                <Button type="primary" @click="createArticle">提交</Button>
            </Col>
        </Form>
    </Row>
</template>

<script>
    import api from "../../axios/http";
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
                        api.postArticle(data).then(res=>{
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
                api.uploadImage(formdata).then(url => {
                    this.$refs.editor.$img2Url(pos, baseUrl + '/storage/' + url.data)
                })
            },
            createArticle(){
                console.log(111)
            }
        },
        mounted() {

        }
    }
</script>

<style scoped>

</style>
