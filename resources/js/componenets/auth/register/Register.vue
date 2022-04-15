<template>
    <div class="w-screen h-screen bg-slate-200">
        <div class="mt-24 flex flex-col items-center">
            <form class="w-[350px] mt-11 flex flex-col bg-white px-4 py-4 rounded-2xl shadow-1xl">
                    <h1 class="text-center text-indigo-600 flex flex-row items-center mt-11 font-bold text-1xl">Register</h1>
                    <h1 class=" flex flex-row items-center mt-1 font-normal text-[8px]">By continuing, you agree to our <span class="mx-1 text-indigo-400 underline">User Agreement</span> and <span class="mx-1 text-indigo-400 underline"> Privacy Policy</span>.</h1>
                <div class="flex flex-col mt-3">
                    <label class="text-sm" for="username">Username*</label>
                    <input id="uasername" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="text" placeholder="username">
                </div>
                <div class="flex flex-col">
                    <label class="text-sm" for="email">Email*</label>
                    <input id="email" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="email" placeholder="mail@website.com">
                </div>
                <div class="flex mt-3 flex-col">
                    <label class="text-sm" for="password">Password*</label>
                    <input id="password" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="password" placeholder="password">
                </div>
                <button class="mt-3 text-1xl text-white font-medium px-4 py-2 bg-indigo-600 rounded-xl">Sign up</button>
                <div class="mt-5 text-sm text-white font-thin px-4 py-2 bg-red-400 rounded-md">
                    <p>Error Error Error Error Error Error Error </p>
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