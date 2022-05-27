<template>

<div>
        <div>
        <h1 class="md:text-4xl text-md font-bold text-indigo-700 text-center">Brand.</h1>
        <div class="flex flex-row text-md items-center mt-11">
            <h2 class="text-center text-gray-900">Register, if you have an Account</h2>
            <p class="text-center font-medium ml-1 text-gray-600">
            <router-link :to="{ name: 'Login' }"> <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">login to your account </a> </router-link></p>
        </div>
    </div>
    <form class="mt-8 space-y-2" @submit="register">
        <input type="hidden" name="remember" value="true" />

        <div class="md:flex flex-row md:space-x-4 w-full text-xs">
            <div class="mb-3 space-y-2 w-full text-xs">
                <label class="font-semibold text-gray-600 py-2">Nom <abbr title="required">*</abbr></label>
                <input placeholder="Nom" v-model="user.nom"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                    required="required" type="text" name="nom" id="integration_shop_name">
                <p class="text-red text-xs hidden">Please fill out this field.</p>
            </div>
            <div class="mb-2 space-y-2 w-full text-xs">
                <label class="font-semibold text-gray-600 py-2">Prenom <abbr title="required">*</abbr></label>
                <input placeholder="prenom" v-model="user.prenom"
                    class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                    required="required" type="text" name="integration[shop_name]" id="integration_shop_name">
                <p class="text-red text-xs hidden">Please fill out this field.</p>
            </div>

        </div>
        <div class="mb-3 space-y-2 w-full text-xs">
            <label class="font-semibold text-gray-600 py-2">Email <abbr title="required">*</abbr></label>
            <input placeholder="Email " v-model="user.email"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                required="required" type="email" name="integration[shop_name]" id="integration_shop_name">
            <p class="text-red text-xs hidden">Please fill out this field.</p>
        </div>
        <div class="mb-3 space-y-2 w-full text-xs">
            <label class="font-semibold text-gray-600 py-2">Date de Naissance <abbr title="required">*</abbr></label>
            <input placeholder="Date de naissance" v-model="user.date_naissance"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                required="required" type="date" name="integration[shop_name]" id="integration_shop_name">
            <p class="text-red text-xs hidden">Please fill out this field.</p>
        </div>
        <div class="mb-3 space-y-2 w-full text-xs">
            <label class="font-semibold text-gray-600 py-2">Mot de passe <abbr title="required">*</abbr></label>
            <input placeholder="mot de passe" v-model="user.pass"
                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                required="required" type="password" name="integration[shop_name]" id="integration_shop_name">
            <p class="text-red text-xs hidden">Please fill out this field.</p>
        </div>
        <div>
            <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 mt-8 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <LockClosedIcon class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" aria-hidden="true" />
                </span>
                Sign up
            </button>
        </div>
    </form>
</div>

</template>

<script >
import { mapActions } from "vuex";

import { LockClosedIcon } from '@heroicons/vue/solid'
import { useRouter } from 'vue-router';
import store from "../store";
import axios from "axios";
import { computed } from '@vue/reactivity';
export default {
    name: "SignUpForm",

    data() {
        return {

            reff: "",
            error: false,
            router: useRouter(),
            user: {
                // id: "",
                "nom": "",
                "prenom": "",
                "date_naissance": "",
                "email": "",
                "pass": "",
            }
        };

    },
    methods: {
        ...mapActions(["redirectTo"]),

        register(ev) {
            ev.preventDefault();
            store
                .dispatch('register', this.user)
                .then((response) => {
                    window.location.href = 'http://localhost:3000/login';
                })
        }
    },
    components: {
        LockClosedIcon
    },
    mounted() {
        let e = sessionStorage.getItem("TOKEN");
        if (e) {
            this.redirectTo({ val: "HomePage" });

        }
    },


}


</script>