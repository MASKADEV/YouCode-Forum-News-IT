

import { createStore } from "vuex";
import axios from "axios";
// import axiosClient from "../axios";
import axiosClient from "../axios";
import { useRouter } from 'vue-router';


import { UserAddIcon } from "@heroicons/vue/solid";
import router from "../router";




const store = createStore({
    state: {
        users: {
            data: {},
            tokenAdmin: sessionStorage.getItem("TOKEN_ADMIN"),
        },



        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
            id: sessionStorage.getItem("idUser"),
        },
        post: {

            data: {
                //  info: {}
            },

        },
        categorie: {
            data: {
                //  info: {}
            },

        },


    },
    getters: {},

    actions: {
        // admin
        getAllUsers({ commit }) {
            return axiosClient.get('/users')
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });                    
                    commit("setUsers", response.data);
                    // console.log(response.data.posts);
                    return response.data
                });

        },
        // delete user
        deleteUser({ commit }, id) {
            return axiosClient.delete('/user/'+id)
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });                    
                    // console.log(response.data.posts);
                    return response.data
                });

        },

        // login admin
        loginAdmin({ commit }, admin) {
            return axiosClient.post('/loginAdmin' ,admin)
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });    
                    if (response.data.message == "success") {
                    commit("setTokenAdmin", response.data.token);

                    }        

                    // console.log(response.data.posts);
                    return response.data
                });

        },

        // end admin



        register({ commit }, user) {

            return axiosClient.post('/register', user)
                .then(response => {
                    commit("setUser", response);
                    return response
                });
        },
        login({ commit }, user) {

            return axiosClient.post('/login', user)
                .then(response => {
                    if (response.data.message == "success") {
                        commit('setUser', response.data.utilisateur);
                        commit('setToken', response.data.token)
                    }

                    return response
                });
        },
        // add comment
        comments({ commit }, comment) {

            return axiosClient.post('/comment', comment)
                .then(response => {

                    return response
                });
        },
        //add like
        like({ commit }, like) {

            return axiosClient.post('/post/like', like)
                .then(response => {

                    return response
                });
        },
        //destroy Like
        destroyLike({ commit }, idPost) {

            return axiosClient.delete('/post/like/' + idPost)
                .then(response => {

                    return response
                });
        },
        // add dislike 
        dislike({ commit }, like) {

            return axiosClient.post('/post/dislike', like)
                .then(response => {

                    return response
                });
        },
        // destroy dislike
        destroyDisLike({ commit }, idPost) {

            return axiosClient.delete('/post/dislike/' + idPost)
                .then(response => {

                    return response
                });
        },

        redirectTo({ commit }, payload) {
            // eslint-disable-next-line no-undef
            commit("redirectTo", payload.val);
        },
        // get posts and his comments
        getAllPosts({ commit }) {
            let post = {};


            return axiosClient.get('/post')
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });                    
                    commit("setPosts", response.data);
                    // console.log(response.data.posts);
                    return response.data
                });


        },
        getAllComments({ commit }) {
            return axiosClient.get('/getAllComments')
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });                    
                    // commit("setComments", response.data);
                    return response.data
                });



        },

        // get all categories
        getAllCategories({ commit }) {
            return axiosClient.get('/categorie')
                .then(response => {
                    commit('setCategories', response.data);

                    return response.data
                });



        },
        // get all posts by  categories

        getAllPostsByCategorie({ commit }, id) {
            console.log(id)
            return axiosClient.get('/post/categorie/' + id)
                .then(response => {
                    // response.data.forEach(obj => {
                    //     Object.entries(obj).forEach(([key, value]) => {
                    //         console.log(`${key} ${value}`);
                    //         if()

                    //     }); });    
                    console.log(response.data)

                    commit("setPosts", response.data);
                    // console.log(response.data.posts);
                    return response.data
                });
        },

        // add post

        addPost({ commit }, post) {
            return axiosClient.post('/post', post)
                .then(response => {
                    console.log(response.data)

                    commit("setPosts", response.data);

                });
        },
        // get info user
        getInfoUser({ commit }, id) {
            return axiosClient.get('/user/' + id)
                .then(response => {
                    // console.log(response.data)


                    commit("setUser", response.data);

                    return response;

                });

        },
        // update user info
        updateUser({ commit }, user) {

            return axiosClient.put('/user/' + user.id, user.info)
                .then(response => {
                    console.log(response.data)
                    // commit("setUser", response.data);
                    return response;

                });
        },
        // test Old password
        testPass({ commit }, user) {

            return axiosClient.post('/testPass/' + user.id, {
                pass: user.pass.old
            })
                .then(response => {


                    return response.data;

                }).catch(function (error) {
                });
        },
        // user post
        postByUser({ commit }, user) {

            return axiosClient.get('/post/user/' + user)
                .then(response => {
                    commit("setPosts", response.data);

                    console.log(response.data);
                    return response.data;

                }).catch(function (error) {
                    console.log(error);
                });
        },
        //delete comment
        deleteComment({ commit }, id) {
            return axiosClient.delete('/comment/' + id)
                .then(response => {

                    console.log(response.data)
                    return response.data;

                }).catch(function (error) {
                    console.log(error);
                });
        },
        deletePost({ commit }, id) {

            return axiosClient.delete('/post/' + id)
                .then(response => {

                    console.log(response.data)
                    return response.data;

                }).catch(function (error) {
                    console.log(error);
                });
        },
        //update post
        updatePost({ commit }, post) {

            return axiosClient.put('/post/' + post.id, post)
                .then(response => {

                    console.log(response.data)
                    return response.data;

                }).catch(function (error) {
                    console.log(error);
                });
        }

    },
    mutations: {
        setPosts: (state, posts) => {
            state.post.data = posts;
            // state.post.comment= "fdfdddf";


        },
        setComments: (state, comments) => {

            // for (let i = 0; i < state.post.data.length; i++) {
            //     state.post.data[i]['comments'] = [];
            // }
            // for (let i = 0; i < comments.length; i++) {
            //     let p = state.post.data.findIndex(x => x.id == comments[i].post_id)

            //     if (p != -1) {
            //         let post = {};
            //         post = comments[i];
            //         state.post.data[p]['comments'].push(post);

            //     }
            // }


        },
        setUser: (state, user) => {
            state.user.data = user;

            state.user.id = user.id;


            sessionStorage.setItem('idUser', state.user.id);
            // sessionStorage.setItem('userInfo', JSON.stringify(state.user.data));
            // sessionStorage.setItem('userInfos', "state.user.data");


        },
        setCategories: (state, categorie) => {
            state.categorie.data = categorie;


        },

        setToken: (state, token) => {
            state.user.token = token;
            sessionStorage.setItem('TOKEN', token);
        },
        redirectTo(state, payload) {
            router.push({ name: payload });
        },

        logout: (state) => {

            state.user.data = {};
            state.user.token = null;
            sessionStorage.clear();
            // this.redirectTo({ val: "Login" });
            router.push("Login")
        },

        //admin

        setUsers: (state, users) => {
            state.users.data = users;

            // state.user.id = user.id;


            // sessionStorage.setItem('userInfo', JSON.stringify(state.user.data));
            // sessionStorage.setItem('userInfos', "state.user.data");


        },


        setTokenAdmin: (state, token) => {
            state.user.token = token;
            sessionStorage.setItem('TOKEN_ADMIN', token);
        },
    },
    modules: {},


})
export default store;
