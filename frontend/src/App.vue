<script >
import {mapState} from 'vuex';

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
</style>
