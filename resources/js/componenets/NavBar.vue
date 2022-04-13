<template lang="">
   <div class="fixed w-full h-12 shadow-1xl bg-gray-100 z-20 flex items-center">
       <div class="container mx-auto flex flex-row items-center justify-between">
            <div class="ml-2">
            <h1 class=" text-indigo-600 md:text-3xl text-xl font-bold hover:cursor-pointer">Brand.</h1>
            </div>
            <nav>
                <ul class="flex flex-row items-center">
                    <li class="px-3 mr-2 py-2 text-base font-medium hover:cursor-pointer">Login</li>
                    <li class="px-3 mr-2 py-2 text-base font-medium hover:cursor-pointer">Register</li>
                </ul>
            </nav>
       </div>
   </div>
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
export default defineComponent({
    setup() {
        
    }
})
</script>