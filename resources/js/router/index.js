import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

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
        name: '首页',
        component:resolve => require(['../views/Layout.vue'],resolve),
        children:[
            {
                // name: '首页',
                icon:"md-home",
                path: 'index',
                component: Home,
            },
            {
                name:'子页',
                icon:"md-people",
                path: 'user',
                component: () => import('../views/About.vue'),
            },
        ],
    },
    {
        path: '/',
        name: '标签管理',
        component:resolve => require(['../views/Layout.vue'],resolve),
        children:[
            {
                name: '标签列表',
                icon:"ios-bookmark",
                path: 'index',
                component: Home,
            },
            {
                name:'新建标签',
                icon:"ios-bookmark",
                path: 'user',
                component: () => import('../views/About.vue'),
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
                path: 'index',
                component: Home,
            },
            {
                name:'新建分类',
                icon:"logo-buffer",
                path: 'user',
                component: () => import('../views/About.vue'),
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
                path: 'index',
                component: Home,
            },
            {
                name:'新建文章',
                icon:"md-book",
                path: 'user',
                component: () => import('../views/About.vue'),
            },
        ],
    },
]

export const router = new VueRouter({
    routes:[...HelpRoutes,...routes],
})

