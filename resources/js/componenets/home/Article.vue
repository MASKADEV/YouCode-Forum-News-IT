<template lang="">
    <div class="w-[90%] max-w-2xl bg-white font-[Poppins] py-7 px-9 shadow-md rounded-xl">
        <div class="flex flex-row items-center justify-between h-[6rem]">
            <div class="flex flex-col">
                <h1 class="font-bold sm:text-2xl text-base w-[80%]">{{ title }}</h1>
                <p class="text-gray-400 text-[13px]">{{ created_at }}</p>
            </div>
            <div class="flex flex-col justify-evenly items-center">
                <ion-icon class="text-2xl cursor-pointer" name="chevron-up-outline"></ion-icon>
                <p class="text-2xl font-bold font-[Poppins]">{{ vote }}</p>
                <ion-icon class="text-2xl cursor-pointer" name="chevron-down-outline"></ion-icon>
            </div>
        </div>
        <p class=" text-gray-400 mt-4"> {{ body }} </p>
        <!-- <p>{{image_path}}</p> -->
        <div class="mt-3 w-full">
            <img class="h-[200px] w-full" :src="image_path" alt="">
        </div>
        <div class=" mt-5 flex flex-row justify-between">
            <div class="flex flex-row ">
                <div class="flex flex-row mr-4 hover:cursor-pointer">
                    <ion-icon class="text-2xl" name="bookmarks-outline"></ion-icon>
                    <p class="ml-2">Favourite</p>
                </div>
                <div class="flex flex-row hover:cursor-pointer">
                    <ion-icon class="text-2xl" name="chatbubbles-outline"></ion-icon>
                    <p class="ml-2">Comments</p>
                </div>
            </div>
            <div class="sm:flex hidden flex-row items-center text-gray-400 text-base hover:cursor-pointer">
                <ion-icon name="person-outline"></ion-icon>
                <p class="ml-2">{{created_by}}</p>
            </div>
        </div>
    </div>
</template>

<script lang='ts'>
import { defineComponent, ref } from "vue";
export default defineComponent({
  setup() {},
  props: {
    title: String,
    body: String,
    image_path: String,
    vote: Number,
    created_at: Date,
    created_by: String,
  },
});
</script>