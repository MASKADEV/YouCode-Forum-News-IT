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
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-50">
    <body class="h-full">
    ```
  -->

  <loginComponent role="User" />

</template>

<script >
import { mapActions } from "vuex";
import useValidate from "@vuelidate/core";
import { required, maxLength } from "@vuelidate/validators";
import { LockClosedIcon } from '@heroicons/vue/solid'
import { useRouter } from 'vue-router';
// import loginComponent from "../components/loginComponent.vue";
import store from "../store";
import loginComponent from '../components/loginComponent.vue'

export default {
  name: "SignInForm",

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
    loginComponent
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
    let e = sessionStorage.getItem("TOKEN");
    // }
    // this.setCategories();
    if (e) {
      this.redirectTo({ val: "HomePage" });

    }
  },
}
</script>