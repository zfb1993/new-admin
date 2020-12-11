import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import ArticleDetail from '../views/articles/detail.vue'
import ArticleList from '../views/articles/list.vue'
import TagDetail from '../views/tags/detail.vue'
import TagList from '../views/tags/list.vue'
import CategoryDetail from '../views/categories/detail.vue'
import CategoryList from '../views/categories/list.vue'

Vue.use(VueRouter)

/**
 * 辅助页面，不出现在菜单中
 * 比如404页面，3级编辑页面等等
 */
export const HelpRoutes = [
    {
        path: '/',
        redirect: '/index'
    },
    {
        path: '/login',
        name: '登录',
        component: resolve => require(['../views/login/Login.vue'],resolve)
    },
];

export const routes = [
    {
        path: '/',
        name: '标签管理',
        component:resolve => require(['../views/Layout.vue'],resolve),
        children:[
            {
                // name: '首页',
                icon:"md-home",
                path: 'index',
                component: Home,
            },
            {
                name: '标签列表',
                icon:"ios-bookmark",
                path: 'tagList',
                component: TagList,
            },
            {
                name:'新建标签',
                icon:"ios-bookmark",
                path: 'tagDetail',
                component: TagDetail,
            },
        ],
    },
    {
        path: '/',
        name: '分类管理',
        component:resolve => require(['../views/Layout.vue'],resolve),
        children:[
            {
                name: '分类列表',
                icon:"logo-buffer",
                path: 'categoryList',
                component: CategoryList,
            },
            {
                name:'新建分类',
                icon:"logo-buffer",
                path: 'categoryDetail',
                component: CategoryDetail,
            },
        ],
    },
    {
        path: '/',
        name: '文章管理',
        component:resolve => require(['../views/Layout.vue'],resolve),
        children:[
            {
                name: '文章列表',
                icon:"md-book",
                path: 'articleList',
                component: ArticleList,
            },
            {
                name:'新建文章',
                icon:"md-book",
                path: 'articleDetail',
                component: ArticleDetail,
            },
        ],
    },
]

export const router = new VueRouter({
    routes:[...HelpRoutes,...routes],
})

