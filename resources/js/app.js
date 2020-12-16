require('./bootstrap');

import Vue from 'vue'
import {router} from './router'
import store from './store'
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
import api from './axios/http'
import axios from 'axios'
import mavonEditor from 'mavon-editor'
import 'mavon-editor/dist/css/index.css'

Vue.use(mavonEditor)
Vue.use(ViewUI);
Vue.prototype.$axios = axios
Vue.prototype.$api = api
Vue.component('Home', require('./views/Index.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store,
});
