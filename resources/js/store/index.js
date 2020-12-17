import Vue from 'vue'
import Vuex from 'vuex'
import api from '../axios/http'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        Tags:null,
        Categories:null,
    },
    mutations: {
        RefreshToken(state, info) {
            state.Token = info;
        },
    },
    actions: {
        AcInit({dispatch, state, commit}) {
            if (!state.Tags){
                api.getTags().then(res=>{
                    state.Tags = res.data
                })
            }
            if (!state.Categories){
                api.getCategories().then(res=>{
                    state.Categories = res.data
                })
            }
        }
    },
    modules: {
    }
})
