<template>
<div>
        <div v-if="showModal"
        class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative my-6 mx-auto w-full max-w-3xl">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                        modifier post
                    </h3>
                    <button
                        class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none">
                        <span
                            class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                            ×
                        </span>
                    </button>
                </div>
                <!--body-->
                <div class="relative p-6 flex-auto w-full">
                    <div class="whitespace-pre-wrap mt-7"> <textarea v-model="this.postData.sjt_post"
                            placeholder="prenom" class="bg-purple-white shadow rounded border-0 p-3 w-full"
                            required="required" name="integration[shop_name]" id="integration_shop_name"></textarea>
                    </div>
                </div>
                <div class=" flex-1 px-2 pt-2 mx-10 m-2">
                    <select v-model="this.categEdit" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option v-for="elem in $store.state.categorie.data" :value="elem.id" :key="elem.id"
                            :selected="elem.nom_categorie == this.categEdit">
                            <div>{{
                                    elem.nom_categorie
                            }} </div>
                        </option>
                        <option disabled value="">....</option>
                    </select>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                    <button
                        class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" v-on:click="toggleModal()">
                        Close
                    </button>
                    <button
                        class="text-green-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" @click="updatePost()">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal edit pot -->
    <div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
    <div class="border     mx-auto max-w-screen-md bg-white mt-10 rounded-2xl p-4"
        v-for="elem in $store.state.post.data.posts" :key="elem.id">
        <div class="flex items-center	justify-between">
            <div class="gap-3.5	flex items-center ">
                <div class="flex flex-col">
                    <b class="mb-2 capitalize"> {{ elem.utilisateur.prenom }} {{ elem.utilisateur.nom }}</b>
                    <div class="flex flex-row items-center">
                        <div class="text-sm">
                            {{ elem.created_at.substring(0, 10) + " " + elem.created_at.substring(10,16) }}
                        </div>
                        <div class="ml-4 text-sm text-black">
                            {{ elem.categorie.nom_categorie.toUpperCase()}}
                        </div>
                    </div>
                </div> 
            </div>
            <div class="rounded-full h-3.5 flex	items-center justify-center">
                <FIcons v-if="this.$parent.$options.name == 'profile' || this.$parent.$options.name=='dashboardAdmin'" id="delete" :icon="['fas', 'trash']"
                    class="h-5 w-5 mt-6" @click="deletePost(elem.id)" />
                <FIcons v-if="this.$parent.$options.name == 'profile'" id="delete" :icon="['fas', 'edit']"
                    class="h-5 w-5 mt-6 mx-2" v-on:click="toggleModal(elem)" />
            </div>
        </div>
        <div ata-modal-toggle="defaultModal" class="whitespace-pre-wrap mt-7">{{ elem.sjt_post }}</div>
        <div class=" h-16 border-b  flex items-center justify-around	" v-if="this.$parent.$options.name!='dashboardAdmin'">
            <div class="flex items-center	gap-3	">
                <PencilAltIcon class="h-6 w-6" />
                <div class="text-sm	"> {{ elem.comments.length }} Comments</div>
            </div>
            <div class="flex items-center	gap-3">
                <div id="likes" class="flex items-center	gap-3" @click="setLike(elem)">
                    <FIcons v-if="isLiked(elem)" :icon="['fas', 'heart']" class="h-5 w-5" />
                    <FIcons v-else :icon="['far', 'heart']" class="h-5 w-5" />
                    <div class="text-sm"> {{ elem.likes.length }} Likes</div>
                </div>
                <div>
                </div>
            </div>
            <div id="dislike" class="flex items-center	gap-3" @click="setDislikeLike(elem)">
                <FIcons v-if="isDisLiked(elem)" :icon="['fas', 'thumbs-down']" class="h-5 w-5" />
                <FIcons v-else :icon="['far', 'thumbs-down']" class="h-5 w-5" />
                <div class="text-sm">{{ elem.dislikes.length }} Dislikes</div>
            </div>
        </div>
        <div  v-if="this.$parent.$options.name!='dashboardAdmin'"
            class="relative flex items-center self-center w-full max-w-xxl p-4 overflow-hidden text-gray-600 focus-within:text-gray-400">
            <input type="search"
                class="w-[90%] mr-4 px-3 py-2 text-sm bg-gray-100 border border-transparent appearance-none rounded placeholder-gray-400 focus:bg-white focus:outline-none focus:border-blue-500 focus:text-gray-900 focus:shadow-outline-blue"
                placeholder="Post a comment..." autocomplete="off"
                v-model="comment.sjt_comments">
            <div class="-mr-1">
                <input type='submit'
                    class="bg-white cursor-pointer text-gray-700 font-medium ml-4 px-3 py-2 border border-gray-400 rounded-md tracking-wide hover:bg-gray-100"
                    value='Post Comment' @click="setComment(elem)">
            </div>
        </div>
        <div class="flex  bg-white dark:bg-gray-800" v-for="ele in elem.comments" :key="ele.id">
            <div class="bg-white text-black px-3 py-2 antialiased flex w-full">
                <div class="w-full">
                    <div class="bg-gray-100 w-full rounded px-4 py-3">
                        <div class="font-semibold text-sm leading-relaxed">{{ ele.user.prenom }} {{ ele.user.nom }}</div>
                        <div class="text-normal leading-snug md:leading-normal"> {{ ele.sjt_comments }}</div>
                    </div>
                </div>
            </div>
            <FIcons v-if="this.$parent.$options.name == 'profile' || this.$parent.$options.name=='dashboardAdmin'" id="delete" :icon="['fas', 'trash']"
                class="h-5 w-5 mt-6" @click="deleteComment(ele.id_comment)" />
        </div>
    </div>
</div>
</template>

<script>

import { BanIcon, HeartIcon, PencilAltIcon } from '@heroicons/vue/outline'

import store from "../store";
export default {
    name: "post",
    data() {
        return {
            comment: {
                "post_id": "",
                "sjt_comments": "",
                "utilisateur_id": sessionStorage.getItem("idUser")

            },
            dataLikePost: {
                "post_id": "",
                "utilisateur_id": sessionStorage.getItem("idUser"),

            },
            postData: {
                "id": "",
                "categorie_id": "",
                "sjt_post": ""
            },
            likeId: "",
            dislikesId: "",
            testCate: true,
            idComment: this.$options.name,
            showModal: false,
            idCat: "",
            categEdit: "",


        };
    },



    components: {
        BanIcon,
        HeartIcon,
        PencilAltIcon
    },
    post: {},
    methods: {
        testEditCategorie(elm) {
            console.log(elm.categorie)

        },
        toggleModal(elm) {
            this.showModal = !this.showModal;
            if (this.showModal) {

                this.postData.id = elm.id;
                this.postData.sjt_post = elm.sjt_post;
                // this.postData.categorie_id = elm.categorie.id
                this.categEdit = elm.categorie.nom_categorie
                this.categEdit = elm.categorie.id
                console.log(this.postData)
            }
        },
      
        // get all posts
        getAllPosts() {
            store
                .dispatch('getAllPosts')
                .then((response) => {
                    // store
                    //   .dispatch('getAllComments')
                    console.log(response);

                    // console.log(store.state.post.data);

                })


        },
        updatePost() {
            this.postData.categorie_id=this.categEdit

            console.log(this.postData)

            store
                .dispatch('updatePost',this.postData)
                .then((response) => {
                    // console.log(response)
                    console.log(response);
                     this.showModal=!this.showModal ;

                    if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                        this.getAllPosts();
                    } else if (this.$parent.$options.name == 'profile') {
                        this.getAllPostsUser()
                    }
                    // this.user.pass = "";          // store
                    //   .dispatch('getAllComments')
                    // console.log(response);



                })
        },
        getAllPostsUser() {
            store
                .dispatch('postByUser', sessionStorage.getItem("idUser"))
                .then((response) => {
                    // store
                    //   .dispatch('getAllComments')


                });
            // get all gategorie
        },
        setCategories() {
            store
                .dispatch('getAllCategories')
                .then((response) => {
                    // store
                    //   .dispatch('getAllComments')
                    // console.log(response);

                    // console.log(store.state.post.data);

                })

        },
        // set comment
        setComment(elem) {
            // console.log(store.state.user.data);  
            this.comment.utilisateur_id = sessionStorage.getItem("idUser");
            this.comment.post_id = elem.id;
            //  console.log(this.comment);
            store
                .dispatch('comments', this.comment)
                .then((response) => {
                    // console.log(response)

                    // store
                    //   .dispatch('getAllComments')
                    // console.log(response);
                    this.comment.sjt_comments = "";
                    if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                        this.getAllPosts();
                    } else if (this.$parent.$options.name == 'profile') {
                        this.getAllPostsUser()
                    } this.getAllPosts();


                    // console.log(store.state.post.data);

                })

            // console.log(elem);  
        },
        // for like

        isLiked(post) {
            // console.log(post);

            for (var elem in post.likes) {
                // console.log(post.likes[elem].utilisateur_id);
                if (post.likes[elem].utilisateur_id == this.comment.utilisateur_id) {
                    // console.log();
                    this.likeId = post.likes[elem].id
                    return true

                }

            }

        },
        async setLike(post) {
            // console.log("ok");
            console.log(this.postData.categorie_id);
            console.log(this.postData.sjt_post);


            this.dataLikePost.post_id = post.id;
            //  console.log(this.comment);
            if (!this.isLiked(post)) {
                store
                    .dispatch('like', this.dataLikePost)
                    .then((response) => {
                        // console.log(response)

                        // store
                        //   .dispatch('getAllComments')
                        // this.comment.sjt_comments = "";
                        if (this.isDisLiked(post)) {
                            this.setDislikeLike(post)

                        }

                        if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                            this.getAllPosts();
                        } else if (this.$parent.$options.name == 'profile') {
                            this.getAllPostsUser()
                        }


                        // console.log(store.state.post.data);

                    })
            }
            else {
                store
                    .dispatch('destroyLike', this.likeId)
                    .then((response) => {

                        // store
                        //   .dispatch('getAllComments')
                        // console.log(response);
                        // this.comment.sjt_comments = "";
                        if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                            this.getAllPosts();
                        } else if (this.$parent.$options.name == 'profile') {
                            this.getAllPostsUser()
                        }


                        // console.log(store.state.post.data);

                    })

            }
        },
        // for dislike
        isDisLiked(post) {

            for (var elem in post.dislikes) {
                // console.log(post.likes[elem].utilisateur_id);
                if (post.dislikes[elem].utilisateur_id == this.comment.utilisateur_id) {
                    // console.log();
                    this.dislikesId = post.dislikes[elem].id
                    return true

                }

            }

        },

        async setDislikeLike(post) {
            // console.log("ok");

            this.dataLikePost.post_id = post.id;
            //  console.log(this.comment);
            if (!this.isDisLiked(post)) {
                store
                    .dispatch('dislike', this.dataLikePost)
                    .then((response) => {


                        if (this.isLiked(post)) {
                            this.setLike(post)

                        }
                        // this.setLike(post)
                        if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                            this.getAllPosts();
                        } else if (this.$parent.$options.name == 'profile') {
                            this.getAllPostsUser()
                        }


                        // console.log(store.state.post.data);

                    })
            }
            else {
                store
                    .dispatch('destroyDisLike', this.dislikesId)
                    .then((response) => {

                        // store
                        //   .dispatch('getAllComments')
                        // console.log(response);
                        // this.comment.sjt_comments = "";
                        if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                            this.getAllPosts();
                        } else {
                            this.getAllPostsUser()
                        }


                        // console.log(store.state.post.data);

                    })

            }
        },


        getAllPostsByCategorie(elem) {
            this.testCate = false;
            // console.log(elem);
            store
                .dispatch('getAllPostsByCategorie', elem)
                .then((response) => {
                    // console.log(response)

                })
        },
        // delete comment
        deleteComment(id) {
            // console.log(id);
            store
                .dispatch('deleteComment', id)
                .then((response) => {

                    if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                        this.getAllPosts();
                    } else if (this.$parent.$options.name == 'profile') {
                        this.getAllPostsUser()
                    }

                })
        },
        // delete post
        deletePost(id) {
            console.log(id);
            store
                .dispatch('deletePost', id)
                .then((response) => {

                    if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
                        this.getAllPosts();
                    } else if (this.$parent.$options.name == 'profile') {
                        this.getAllPostsUser()
                    }

                })
        },



    },

    mounted() {
        console.log(this.postData);

        // this.post = store.state.post.data;
        if (this.testCate) {
            if (this.$parent.$options.name == 'homePage' || this.$parent.$options.name=="dashboardAdmin") {
                this.getAllPosts();
            } else {
                this.getAllPostsUser()
            }

        }
        if (this.$parent.$options.name == 'homePage'|| this.$parent.$options.name=="dashboardAdmin") {
            this.getAllPosts();
        } else {
            this.getAllPostsUser()
        }
        this.setCategories();
        this.idComment = this.$options.name

    },
    props: {
        nameMethod: String,

    }
}

</script>
<style>
#likes {
    cursor: pointer;

}

#dislike {
    cursor: pointer;

}
</style>