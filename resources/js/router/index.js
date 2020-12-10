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
]

export const router = new VueRouter({
    routes:[...HelpRoutes,...routes],
})

