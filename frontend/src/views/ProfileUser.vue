<template>
  <!-- component -->
  <div class="bg-gray-100">
    <div class="w-full text-white bg-main-color">
      <div x-data="{ open: false }"
        class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      </div>
    </div>
    <!-- End of Navbar -->
    <div v-if="msgUpdate" class="bg-green-400 rounded-lg py-5 px-6 text-base text-yellow-700 mb-3" role="alert">
      Bien modifier </div>
    <div class="container w-auto mx-auto my-4 p-5">
      <div class="flex md:flex-row flex-col mx-auto">
        <!-- Right Side -->
        <div class="md:w-[50%] w-[90%] py-5 mx-auto rounded-lg">
          <!-- Profile tab -->
          <form @submit="updateUser">
            <div class="bg-white p-3 shadow-sm rounded-sm">
              <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                <h1 class="md:text-2xl text-medium">Details</h1>
              </div>
              <div class="text-gray-700">
                <div class="grid md:grid-cols-2 text-sm">
                  <div class="grid grid-cols-1  mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold">Prenom</div>
                    <input v-model="user.info.prenom" placeholder="prenom"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-1 mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold">Nom</div>
                    <input placeholder="Nom" v-model="user.info.nom"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-1 mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold">email</div>
                    <input placeholder="Email " v-model="user.info.email"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 py-2"
                      required="required" type="email" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-1 mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold"> date de naissance</div>
                    <input disabled placeholder="date de naissance" v-model="user.info.date_naissance"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-1 mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold"> old password</div>
                    <input placeholder="old password" v-model="user.pass.old"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                  <div class="grid grid-cols-1 mt-4 mx-1">
                    <div class="px-4 py-2 font-semibold">new password</div>
                    <input placeholder="new password" v-model="user.pass.new"
                      class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-3  py-2"
                      type="password" name="integration[shop_name]" id="integration_shop_name">
                  </div>
                </div>
              </div>
              <button type="submit"
                class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Update
              </button>
            </div>
          </form>
        </div>
        <div class="md:w-[70%] md:mx-5">
          <!-- post  -->
          <post>
          </post>
          <!-- End post -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { BanIcon, HeartIcon, PencilAltIcon } from '@heroicons/vue/outline'
import post from '../components/post.vue'
import { mapActions } from "vuex";

import store from "../store";


export default {
  name: "profile",
  data() {
    return {

      user: {
        info: {
          "nom": "",
          "prenom": "",
          "date_naissance": "",
          "email": "",
          "pass": "",
        },
        id: sessionStorage.getItem("idUser"),
        pass: {
          "old": "",
          "new": "",

        },
      },
      //
      // post
      msgUpdate: false,

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
      likeId: "",
      dislikesId: "",
      testCate: true


    }
  },
  components: {
    BanIcon,
    HeartIcon,
    PencilAltIcon,
    post
  },
  methods: {
              ...mapActions(["redirectTo"]),

    getInfoUser() {
      store
        .dispatch('getInfoUser', this.user.id)
        .then((response) => {
          this.user.info = response.data;
        })
    },
    updateUser(ev) {
      ev.preventDefault();
      var test = "";
      if (this.user.pass.old != "" && this.user.pass.new != "") {
        // test if old password correct
        store
          .dispatch('testPass', this.user)
          .then((response) => {
            if (response.message == "sucess") {
              this.user.info.pass = this.user.pass.new;
              store
                .dispatch('updateUser', this.user)
                .then((response) => {
                  console.log("Bien updated")
                  this.user.pass.new = "";
                  this.user.pass.old = "";
                  this.msgUpdate = true
                })

            } else {
              console.log("ereur mdp")
            };
          })


      } else if (this.user.pass.old == "" && this.user.pass.new == "") {
        store
          .dispatch('updateUser', this.user)
          .then((response) => {
            this.msgUpdate = true

            console.log("Bien updated")

          })
      }
    },
  },
  mounted() {
    // 
    let e = sessionStorage.getItem("TOKEN");
    // }
    if (!e) {
      this.redirectTo({ val: "Login" });
    }
    this.getInfoUser();
  }
}
</script>
 <style>
:root {
  --main-color: #4a76a8;
}

.bg-main-color {
  background-color: var(--main-color);
}

.text-main-color {
  color: var(--main-color);
}

.border-main-color {
  border-color: var(--main-color);
}

#delete {
  cursor: pointer;
}
</style>