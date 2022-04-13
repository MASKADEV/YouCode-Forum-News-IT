<template lang="">
     <NavBar />
    <div class="flex flex-row">
        <SideNav />
        <router-view />
    </div>
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
import NavBar from './componenets/NavBar.vue'
import SideNav from './componenets/SideNav.vue'
export default defineComponent({
    setup() {
        
    },
    components: {
        NavBar,
        SideNav
    }
})
</script>