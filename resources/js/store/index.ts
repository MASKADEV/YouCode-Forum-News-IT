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
    },
    
    getters: {
    },
    modules: {}
});


