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
    }
}


export default api
