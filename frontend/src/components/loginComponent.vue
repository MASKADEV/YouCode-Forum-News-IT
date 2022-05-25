<template>
    <div>
        <img class="mx-auto h-24 w-24" src="https://upload.wikimedia.org/wikipedia/commons/9/93/Taskful_Logo.svg"
            alt="Workflow" />
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account {{ role }}</h2>
        <p class="mt-2 text-center text-sm text-gray-600" v-if="this.$parent.$options.name == 'SignInForm'">
            <!-- 
          {{ ' ' }} -->
            Or
            <router-link :to="{ name: 'Register' }"> <a href="#"
                    class="font-medium text-indigo-600 hover:text-indigo-500">
                    register for free </a></router-link>
        </p>
    </div>
    <div v-if="error" class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
        email ou mot de pass incorrect !
    </div>
    <form class="mt-8 space-y-6" @submit="login">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm -space-y-px">
            <div class="mb-3 space-y-2 w-full text-xs" v-if="this.$parent.$options.name == 'SignInForm'">
                <label class="font-semibold text-gray-600 py-2">Email <abbr title="required">*</abbr></label>
                <input placeholder="Email " v-model="user.email"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                    required="required" type="email" name="integration[shop_name]" id="integration_shop_name">
                <p class="text-red text-xs hidden">Please fill out this field.</p>
            </div>
            <div class="mb-3 space-y-2 w-full text-xs" v-else>
                <label class="font-semibold text-gray-600 py-2">refference <abbr title="required">*</abbr></label>
                <input placeholder="Reff " v-model="user.email"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                    required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                <p class="text-red text-xs hidden">Please fill out this field.</p>
            </div>


            <div class="mb-3 space-y-2 w-full text-xs">
                <label class="font-semibold text-gray-600 py-2">password <abbr title="required">*</abbr></label>
                <input placeholder="password" v-model="user.pass"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                    required="required" type="password" name="integration[shop_name]" id="integration_shop_name">
                <p class="text-red text-xs hidden">Please fill out this field.</p>
            </div>
        </div>



        <div>
            <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
                </span>
                Sign in
            </button>
        </div>
    </form>
</template>
<script >
import { mapActions } from "vuex";
import useValidate from "@vuelidate/core";
import { required, maxLength } from "@vuelidate/validators";
import { LockClosedIcon } from '@heroicons/vue/solid'
import { useRouter } from 'vue-router';
import store from "../store";
export default {
    name: "loginComponent",

    data() {
        return {
            testt: sessionStorage.getItem("TOKEN"),
            reff: "",
            error: false,
            router: useRouter(),
            user: {
                // id: "",
                "email": "",
                "pass": "",
            },
            admin: {
                "reff_admin": "",
                "pass": ""
            }
        };
    },
    components: {
        LockClosedIcon
    },
    props: {
        role: String
    },
    methods: {
        ...mapActions(["redirectTo"]),

        // alidations() {
        //   return {
        //     reff: { required, maxLength: maxLength(10) },
        //   }
        // },
        login(ev) {

            ev.preventDefault();


            // store
            //     .dispatch('login', this.user)
            //     .then((response) => {


            //         console.log(response);
            //         if (response.data.message != "success") {
            //             this.error = true
            //         }
            //         this.redirectTo({ val: "HomePage" });
            //     })
            console.log(this.$parent.$options.name)

            if (this.$parent.$options.name == 'SignInForm') {

                store
                    .dispatch('login', this.user)
                    .then((response) => {


                        console.log(response);
                        if (response.data.message != "success") {
                            this.error = true
                        }
                        this.redirectTo({ val: "HomePage" });
                    })


            } else if (this.$parent.$options.name == 'LoginAdmin') {

                this.admin.reff_admin = this.user.email;
                this.admin.pass = this.user.pass;

                store
                    .dispatch('loginAdmin', this.admin)
                    .then((response) => {


                        console.log(response);
                        if (response.message != "success") {
                            this.error = true

                        } else if (response.message == "success") {

                            this.redirectTo({ val: "dashboardAdmin" });

                        }
                    })

            }

        },

        // admin login

        loginAdmin(ev) {

            ev.preventDefault();


            // store
            //     .dispatch('loginAdmin', this.user)
            //     .then((response) => {


            //         console.log(response);
            //         if (response.data.message != "success") {
            //             this.error = true
            //         }
            //         this.redirectTo({ val: "HomePage" });
            //     })


        },




    }
}
</script>