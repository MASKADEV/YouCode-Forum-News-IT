<template lang="">
    <NavBar />
    <router-view />
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
import NavBar from './componenets/NavBar.vue'
export default defineComponent({
    setup() {
        
    },
    components: {
        NavBar,
    }
})
</script>