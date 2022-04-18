<template>
    <div class="w-screen h-screen bg-slate-200">
        <div>a</div>
        <div class="mt-24 flex flex-col items-center">
            <form class="w-[350px] mt-11 flex flex-col bg-white px-4 py-11 rounded-2xl shadow-1xl">
                    <h1 class="text-center text-indigo-600 flex flex-row items-center font-bold text-1xl">Register</h1>
                    <h1 class=" flex flex-row items-center mt-1 font-normal text-[8px]">By continuing, you agree to our <span class="mx-1 text-indigo-400 underline">User Agreement</span> and <span class="mx-1 text-indigo-400 underline"> Privacy Policy</span>.</h1>
                <div class="flex flex-col mt-3">
                    <label class="text-sm" for="username">Username*</label>
                    <input v-model="form.username" id="uasername" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="text" placeholder="username">
                </div>
                <div class="flex flex-col">
                    <label class="text-sm" for="email">Email*</label>
                    <input v-model="form.email" id="email" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="email" placeholder="mail@website.com">
                </div>
                <div class="flex mt-3 flex-col">
                    <label class="text-sm" for="password">Password*</label>
                    <input v-model="form.password" id="password" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="password" placeholder="password">
                </div>
                <div class="flex mt-3 flex-col">
                    <label class="text-sm" for="confirmPassword">Confirm Password*</label>
                    <input v-model="form.password_confirmation" id="confirmPassword" required class="py-3 px-2 mb-2 mt-1 text-sm rounded-xl border-2 border-gray-300" type="confirmPassword" placeholder="Confirm Password">
                </div>
                <button @click.prevent="register" class="mt-3 text-1xl text-white font-medium px-4 py-2 bg-indigo-600 rounded-xl">Sign up</button>
                <div class="mt-5 text-sm text-white font-thin px-4 py-2 bg-red-400 rounded-md">
                    <p v-if="error">{{ error[0] }}</p>
                </div>
            </form>
            
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import axios from 'axios';
export default defineComponent({
    setup() {
        const form = ref({
            username : '',
            email : '',
            password : '',
            password_confirmation : '',
        });
        const error = ref([]);
        const register = async () => {
            await axios.post('/api/register', form).then(() =>{
                console.log('saved');
            }).catch((error) =>{
                error = error.response.data.errors;
            })
        }
        return {
            form,
            error,
            register,
        }
    },
    created () {
    }
})
</script>