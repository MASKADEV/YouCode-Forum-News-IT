import {createStore} from 'vuex';

export type State = { show: boolean };

const state: State = { show: false };

export default createStore({
    state,
    mutations: {
      showNav(state, payload) {
        state.show = !state.show;
        console.log(state.show);
      }
    },
    actions: {
        showNav({ commit }) {
        commit("showNav");
      }
    },
    
    getters: {
      show(state) {
        return state.show;
      }
    },
    modules: {}
});


