<template>
    <div class="w-screen h-screen bg-slate-200">
        <div>a</div>
        <div class="mt-24 flex flex-col items-center justify-center">
            <form class="w-[350px] mt-11 flex flex-col bg-white px-4 py-11 rounded-2xl shadow-1xl">
                    <h1 class="text-center text-indigo-600 flex flex-row items-center font-bold text-1xl">Login</h1>
                <div class="flex flex-col mt-5">
                    <label class="text-sm" for="email">Email*</label>
                    <input id="email" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="email" placeholder="mail@website.com">
                </div>
                <div class="flex mt-3 flex-col">
                    <label class="text-sm" for="password">Password*</label>
                    <input id="password" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="password" placeholder="password">
                </div>
                <button class="mt-3 text-1xl text-white font-medium px-4 py-2 bg-indigo-600 rounded-xl">Sign in</button>
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
