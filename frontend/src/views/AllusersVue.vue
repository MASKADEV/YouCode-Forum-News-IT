<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    <!-- tailwind.config.js -->
    <!-- tailwind.config.js -->




    <!-- component -->
    <div>

        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>


            <div class="flex-1 flex flex-col overflow-hidden">

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">All users : </h3>



                        <div class="mt-8">

                        </div>

                        <div class="flex flex-col mt-8">
                            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th class=" px-6 py-3 border-b border-gray-200 bg-gray-50 text-left
                                                text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Nom </th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Prenom</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Email</th>
                                                <th
                                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    age</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"> Supprimer
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white">
                                            <tr v-for="elem in $store.state.users.data" :value="elem.id" :key="elem.id">
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-bold   leading-5 text-gray-900">
                                                        {{ elem.nom }}

                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900"> {{ elem.prenom }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="text-sm leading-5 text-gray-900"> {{ elem.email }}
                                                    </div>

                                                </td>



                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                                    {{ elem.age }}
                                                </td>

                                                <td
                                                    class="px-6 py-4 whitespace-no-wrap text-center border-b border-gray-200 text-sm leading-5 font-medium">
                                                    <FIcons id="delete" :icon="['fas', 'trash']" class="h-5 w-5"
                                                        @click="deleteUser(elem.id)" />

                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

</template>

<script >
// import { mapActions } from "vuex";
import useValidate from "@vuelidate/core";
import { required, maxLength } from "@vuelidate/validators";
import { LockClosedIcon } from '@heroicons/vue/solid'
import { useRouter } from 'vue-router';
// import loginComponent from "../components/loginComponent.vue";
import store from "../store";
import loginComponent from '../components/loginComponent.vue'
import Post from "../components/post.vue";

export default {
    name: "Allusers",

    data() {
        return {
            v$: useValidate(),

            reff: "",
            error: false,
            router: useRouter(),
            user: {
                // id: "",
                "email": "",
                "pass": "",
            }
        };
    },
    components: {
        LockClosedIcon,
        loginComponent,
        Post
    },
    methods: {
        // ...mapActions(["redirectTo"]),
        getAllUsers() {
            store
                .dispatch('getAllUsers')
                .then((response) => {
                    // store
                    //   .dispatch('getAllComments')
                    console.log(response);

                    // console.log(store.state.post.data);

                })


        },
        deleteUser(id) {
            store
                .dispatch('deleteUser', id)
                .then((response) => {
                    // store
                    //   .dispatch('getAllComments')
                    console.log(response);
                    this.getAllUsers()

                    // console.log(store.state.post.data);

                })
        }

        // alidations() {
        //   return {
        //     reff: { required, maxLength: maxLength(10) },
        //   }
        // },





    },
    mounted() {
        this.getAllUsers()
        let e = sessionStorage.getItem("TOKEN_ADMIN");
        // }
        // this.setCategories();
        if (!e) {
            this.redirectTo({ val: "LoginAdmin" });

        }

    
},
}
</script>