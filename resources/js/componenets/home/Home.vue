<template lang="">
    <div class="w-full bg-gray-200 h-screen">
        <h1>a</h1>
        <div class="container mx-auto mt-14 md:pl-[19rem] pl-[2rem]">
            <h1>Trending</h1>
            <Article :title="title" :body="body" 
                    :created_at="created_at" 
                    :created_by="created_by"
                    :vote = "vote"
                    :image_path  = "image_path" 
            />
        </div>
    </div>
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
import { useStore } from "vuex";
import Article from './Article.vue';

export default defineComponent({
    setup() {
        const store = useStore();
        const show = ref(store.state);
        const consoleME = () => {
        store.commit("showNav");
         };
        return {
            show,
            consoleME,
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
    }
})
</script>