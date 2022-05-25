<script >
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import {mapState} from 'vuex'

export default {

data(){
        return{


        }
},
    components : {

    },
computed : {

  ...mapState(['user']),
    getData(){
        return this.$store.state.id_RDV
    },

}

}
</script>
<template>
  <router-view></router-view>

</template>

<style>
#app {
 
}
</style>
