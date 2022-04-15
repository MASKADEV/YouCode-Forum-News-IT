<template lang="">
    <div class="w-full bg-gray-200">
        <h1>a</h1>
        <div class="container mx-auto mt-11 md:pl-[19rem] pl-[2rem]">
            <div class="mb-4 h-[50px] flex flex-row items-center">
                <h1 class="hover:cursor-pointer hover:text-3xl w-[120px] text-center text-2xl font-bold hover:text-black text-gray-500">Trending</h1>
                <h1 class="hover:cursor-pointer hover:text-3xl w-[120px] text-center text-2xl ml-4 font-bold hover:text-black text-gray-500">Recent</h1>
            </div>
                <Article :title="title" :body="body" 
                        :created_at="created_at" 
                        :created_by="created_by"
                        :vote = "vote"
                        :image_path  = "image_path" 
                />
        </div>
    </div>
    <AddPost />
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
import { useStore } from "vuex";
import Article from './Article.vue';
import AddPost from './AddPost.vue';

export default defineComponent({
    setup() {
        return {
            title : 'Sony tease the World With First Deatails About PS5',
            body : 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout',
            created_at : '2022-04-20 12:33',
            created_by : 'MASKA',
            vote : 33,
            image_path : "https://wallpaperaccess.com/full/85193.jpg"
        };
    },
    components : {
        Article,
        AddPost
    }
})
</script>