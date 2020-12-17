<template>
    <Row>
        <Form :model="article" :label-width="80" ref="article"  :rules="ruleValidate">
            <Col :span="12">
                <FormItem label="文章标题" prop="title">
                    <Input v-model="article.title" placeholder="文章标题"></Input>
                </FormItem>
            </Col>
            <Col :span="20">
                <FormItem label="标签" >
                    <Tags :checkedTags="article.tagIds" @getTagIds="getTagIds"></Tags>
                </FormItem>
            </Col>
            <Col :span="20">
                <FormItem label="分类" >
                    <Categories :checkedId="article.categoryId" @getCategory="getCategory"></Categories>
                </FormItem>
            </Col>
            <Col :span="20">
                <FormItem label="文章内容" prop="value">
                    <mavon-editor v-model="article.value" ref="editor" @imgAdd="$imgAdd" @save="markDownSub"></mavon-editor>
                </FormItem>
            </Col>
            <Col :span="20" style="text-align: right;">
                <Button type="primary" @click="markDownSub">提交</Button>
            </Col>
        </Form>
    </Row>
</template>

<script>
    import api from "../../axios/http";
    import Tags from '../components/TagCheck';
    import Categories from '../components/CategorySelect';
    import baseUrl from '../../axios/config'
    import {mapState} from 'vuex';

    export default {
        components:{
            Tags,  Categories
        },
        name: "detail",
        data(){
            return {
                ruleValidate: {
                    title: [
                        { required: true, message: '标题不能为空', trigger: 'blur' }
                    ],
                    value: [
                        { required: true, message: '内容不能为空', trigger: 'blur' },
                    ],
                },
                article: {
                    title: '',
                    value: '',
                    tagIds: [],
                    categoryId: '',
                    id: ''
                }
            }
        },
        computed:{
            ...mapState(['ArticleList']),
        },
        methods:{
            filterAppInfoFromAppList(){
                if(!this.ArticleList){
                    this.$Message.error('未找到文章');
                    this.$router.push('articleList');
                    return ;
                }
                let find = this.ArticleList.data.find(d=>d.id==this.$route.query.id);
                if(!find){
                    this.$Message.error('未找到文章');
                    this.$router.push('articleList');
                }else{
                    this.article.id = find.id
                    this.article.title = find.title
                    this.article.value = find.article
                    this.article.tagIds = find.tag_id
                    this.article.categoryId = find.category_id
                }
            },
            markDownSub(){
                this.$refs.article.validate(validate=>{
                    if(validate){
                        let data = {
                            id: this.article.id,
                            title: this.article.title,
                            article: this.article.value,
                            tag_id: this.article.tagIds,
                            category_id: this.article.categoryId,
                        }
                        api.editArticle(data).then(res=>{
                            if(res.data.state == 0){
                                this.$Message.success('操作成功');
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
            getTagIds(value){
                this.article.tagIds = value
            },
            getCategory(value){
                this.article.categoryId = value
            }
        },
        mounted() {
            this.filterAppInfoFromAppList()
        }
    }
</script>

<style scoped>

</style>
