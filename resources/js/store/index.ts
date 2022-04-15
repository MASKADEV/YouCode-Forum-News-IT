import {createStore} from 'vuex';

export type State = { show: boolean,
                      addPost : boolean  ,                  
};

const state: State = { show: false, addPost:false };

export default createStore({
    state,
    mutations: {
      showNav(state, payload) {
        state.show = !state.show;
      },
      showPost(state, payload){
        state.addPost = !state.addPost;
      }
    },
    actions: {
      showNav({ commit }) {
        commit("showNav");
      },
      showPost({commit}) {
        commit("showPost");
        console.log(state.addPost);
      }
    },
    
    getters: {
      showNav(state) {
        return state.show;
      },
      showPost(state) {
        return state.addPost;
      }
    },
    modules: {}
});


