
<template>
  <loginComponent role="User" />
</template>

<script >
import { mapActions } from "vuex";
import useValidate from "@vuelidate/core";
import { useRouter } from 'vue-router';
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
        "email": "",
        "pass": "",
      }
    };
  },
  
  components: {
    loginComponent
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
    let e = sessionStorage.getItem("TOKEN");
    if (e) {
      this.redirectTo({ val: "HomePage" });
    }
  },
}
</script>