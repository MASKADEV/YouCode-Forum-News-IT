<template>
        <div v-if="show.addPost" class="bg-white mt-24 rounded-2xl flex flex-col justify-start shadow-2xl h-[500px] w-[350px] sm:right-[25%] right-5 fixed">
           <form action="" class="flex flex-col justify-center items-center">
                <div class="flex mt-5 flex-col w-[280px] ">
                    <label class="mt-9" for="title">Title*</label>
                    <input id="title" class="py-2 px-3 mt-2 border-gray-400 border-2 rounded-lg" type="text" placeholder="title">
                </div>
                <div class="flex flex-col w-[280px] ">
                    <label class="mt-9" for="body">Description*</label>
                    <input id="body" class="py-2 px-3 mt-2 border-gray-400 border-2 rounded-lg" type="text" placeholder="Description">
                </div>
                <div class="flex flex-col w-[280px] ">
                    <label class="mt-9" for="Image">Upload File</label>
                    <input class="py-2 px-3 mt-2 border-gray-400 border-2 rounded-lg" type="file">
                </div>
                <div class="flex flex-row justify-between items-center mt-9">
                    <button @click.prevent="" class="px-4 mr-3 rounded-lg py-2 bg-indigo-700 font-medium text-white">Add Post</button>
                    <button @click.prevent="closeForm" class="ml-3 px-3 py-2 font-medium text-black">Cancel</button>
                </div>
           </form>
        </div>    
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue'
import { useStore } from "vuex";

export default defineComponent({
    setup() {
        const store = useStore();
        const show = ref(store.state);
        const closeForm = () => {
            store.commit('showPost');
        }
        return {
            show,
            closeForm,
        }
    },
})
</script>
