<template>
    <!-- component -->
    <div>

        <div  class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div> 
            <div class="flex-1 flex flex-col overflow-hidden">
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container mx-auto px-6 py-8">
                        <h3 class="text-gray-700 text-3xl font-medium">Posts and comments : </h3>
                        <div class="mt-8">
                        </div>
                       <Post/>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script >
import { mapActions } from "vuex";
import useValidate from "@vuelidate/core";
import { LockClosedIcon } from '@heroicons/vue/solid'
import { useRouter } from 'vue-router';
import store from "../store";
import loginComponent from '../components/loginComponent.vue'
import Post from "../components/post.vue";

export default {
    name: "dashboardAdmin",

    data() {
        return {
            v$: useValidate(),

            reff: "",
            error: false,
            router: useRouter(),
            user: {
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
        ...mapActions(["redirectTo"]),
        login(ev) {
            ev.preventDefault();
            store
                .dispatch('login', this.user)
                .then((response) => {
                    console.log(response);
                    if (response.data.message != "success") {
                        this.error = true
                    }
                    this.redirectTo({ val: "HomePage" });
                })
        },
    },
    mounted() {
        let e = sessionStorage.getItem("TOKEN_ADMIN");
    if (!e) {
      this.redirectTo({ val: "LoginAdmin" });
        }
    },
}
</script>