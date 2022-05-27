
<template>


  <main class=" overflow-x-hidden overflow-y-auto bg-gray-100">
    <div v-if="msgAdd" class="bg-green-100 rounded-lg py-5 px-6 text-base text-green-700 mb-3" role="alert">
      Bien ajoute </div>

    <div class="border-1   mt-6 bg-white rounded-2xl p-4  mx-auto   flex-1     max-w-screen-md ">
      <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
      <button v-for="elem in $store.state.categorie.data" :key="elem.id"
        class="inline-block border border-teal-500 text-teal-500 rounded-full px-6 py-2 mr-4"
        @click="getAllPostsByCategorie(elem.id)">{{ elem.nom_categorie }} </button>
    </div>
    <div class="relative my-6 mx-auto w-full max-w-3xl ">
      <!-- add post -->
      <div class="border-1   mt-6 bg-white rounded-2xl p-4  mx-auto   flex-1     max-w-screen-md">
        <div class="flex">
          <div class="flex-1 m-2">
            <h2 class="px-4 py-2 text-xl font-semibold text-black">Home</h2>
          </div>
          <div class="flex-1 px-4 py-2 m-2">
          </div>
        </div>
        <hr class="border-gray-300">
        <div class=" flex-1 px-2 pt-2 mt-3">
          <select v-model="this.postData.categorie_id" required class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 
                bg-white hover:border-gray-400 focus:outline-none appearance-none">
            <option :value=elem.id v-for="elem in $store.state.categorie.data" :key="elem.id">{{ elem.nom_categorie }}
            </option>
          </select>
        </div>
        <form @click.prevent>
          <div class="flex">
            <div class="flex-1 px-2 pt-2 mt-2">
              <textarea v-model="postData.sjt_post" class=" bg-transparent text-gray-400 font-medium text-lg w-full"
                rows="2" cols="50" placeholder="What's happening?" required></textarea>
            </div>
          </div>

          <!-- //categorie Post -->
          <!--middle creat tweet below icons-->
          <div class="flex">
            <div class="flex-1">
              <button type="submit"
                class=" mt-5 bg-indigo-600 text-white font-bold py-2 px-8 rounded-full mr-8 float-right"
                @click="addPost">
                post
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <post nameMethod="t">
    </post>
  </main>
</template>

<script>
import { BanIcon, HeartIcon, PencilAltIcon } from '@heroicons/vue/outline'
import post from '../components/post.vue'
import store from "../store";
import { mapActions } from "vuex";

export default {
  name: "homePage",
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
        "utilisateur_id": sessionStorage.getItem("idUser"),
        "categorie_id": "",
        "sjt_post": ""
      },
      msgAdd: false,
      dislikesId: "",
      testCate: true,
      showModal: false

    };
  },


  components: {
    BanIcon,
    HeartIcon,
    PencilAltIcon,
    post
  },
  post: {},
  methods: {
    ...mapActions(["redirectTo"]),

    getAllPosts() {
      store
        .dispatch('getAllPosts')
        .then((response) => {
          console.log(response);
        })


    },

    // get all posts
    toggleModal: function () {
      this.showModal = !this.showModal;
    },

    setCategories() {
      store
        .dispatch('getAllCategories')
        .then((response) => {
        })

    },

    getAllPostsByCategorie(elem) {
      this.testCate = false;
      store
        .dispatch('getAllPostsByCategorie', elem)
        .then((response) => {
        })
    },
    async addPost() {
      sessionStorage.removeItem("userInfo");

      store
        .dispatch('addPost', this.postData)
        .then((response) => {
          this.postData.sjt_post = "";
          this.msgAdd = true
          this.getAllPosts();
        })
    }

  },

  mounted() {
    let e = sessionStorage.getItem("TOKEN");
    if (!e) {
      this.redirectTo({ val: "Login" });

    }
    console.log(e);
  },

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