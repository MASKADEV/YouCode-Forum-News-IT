<template lang="">
   <div class="fixed w-full h-12 shadow-1xl bg-gray-100 z-20 flex items-center">
       <div class="container mx-auto flex flex-row items-center justify-between">
            <div class="ml-2">
            <router-link to="/"><h1 class=" text-indigo-600 md:text-3xl text-xl font-bold hover:cursor-pointer">Brand.</h1></router-link>
            </div>
            <nav>
                <ul class="flex flex-row items-center ">
                    <router-link to="/login"><li class="px-3 mr-2 py-2 text-base font-medium hover:cursor-pointer">Login</li></router-link>
                    <router-link to="/register"><li class="px-3 mr-2 py-2 text-base font-medium hover:cursor-pointer">Register</li></router-link>
                    <li @click="consoleME" class="mr-2 text-3xl font-medium hover:cursor-pointer"><ion-icon name="add-circle-outline"></ion-icon></li>
                </ul>
            </nav>
       </div>
   </div>
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
import {useStore} from 'vuex';

export default defineComponent({
    setup() {
        const store = useStore();
        const show = ref(store.state);
        const consoleME = () => {
            store.commit("showPost");
         };
        return {
            consoleME
        }
    },
    
})
</script>