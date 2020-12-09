require('./bootstrap');

import Vue from 'vue'
import {router} from './router'
import store from './store'
import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';

Vue.use(ViewUI);
Vue.component('Home', require('./views/Index.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store,
});
