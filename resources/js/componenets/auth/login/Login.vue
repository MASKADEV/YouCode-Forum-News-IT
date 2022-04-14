<template>
    <div class="w-screen h-screen bg-slate-200">
        <div class="mt-20 flex flex-col items-center">
            <div class="flex flex-col justify-start">
                <h1 class=" flex flex-row items-center mt-11 font-semibold text-2xl">Login</h1>
                <h1 class=" flex flex-row items-center mt-1 font-normal text-sm">By continuing, you agree to our <span class="mx-1 text-indigo-400 underline">User Agreement</span> and <span class="mx-1 text-indigo-400 underline"> Privacy Policy</span>.</h1>
            </div>
            <form class="w-[300px] mt-11 flex flex-col ">
                <div class="flex flex-col">
                    <label class="text-sm" for="email">Email*</label>
                    <input id="email" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="email" placeholder="mail@website.com">
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
export default defineComponent({
    setup() {
        
    },
    created () {
    }
})
</script>
