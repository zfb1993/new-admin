import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        Token:null,
    },
    mutations: {
        RefreshToken(state, info) {
            state.Token = info;
        },
    },
    actions: {
    },
    modules: {
    }
})
