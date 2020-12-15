import {get,post,filePost} from './axios'

const api = {
    userLogin(data){
        return post('/login',data)
    },
    userInfo(data){
        return post('/user',data)
    },
    uploadImage(data){
        return filePost('/uploadImage',data)
    },
    postArticle(data){
        return post('/article',data)
    },
    getArticle(data){
        return get('/articleList',data)
    },
    createTag(data){
        return post('/tag_add',data)
    },
    getTags(data){
        return post('/tag_list',data)
    },
    editTags(data){
        return post('/tag_edit',data)
    },
    deleteTag(data){
        return post('/tag_delete',data)
    },
    createCategory(data){
        return post('/category_add',data)
    },
    getCategories(data){
        return post('/category_list',data)
    },
    editCategory(data){
        return post('/category_edit',data)
    },
    deleteCategory(data){
        return post('/category_delete',data)
    },
}


export default api
