<template lang="">
    <div class=" mt-11 h-[400px] w-[90%] bg-white font-[Poppins] py-7 px-9 shadow-md rounded-xl">
        <div class="flex flex-row justify-between">
            <h1 class="font-bold text-2xl w-[80%]">{{ title }}</h1>
            <div class="flex flex-col justify-between items-center">
                <ion-icon class="text-2xl cursor-pointer" name="chevron-up-outline"></ion-icon>
                <p class="text-2xl font-bold font-[Poppins]">{{ vote }}</p>
                <ion-icon class="text-2xl cursor-pointer" name="chevron-down-outline"></ion-icon>
            </div>
        </div>
        <p class=" text-gray-400"> {{ body }} </p>
        <!-- <p>{{image_path}}</p> -->
        <div class="h-[300px] w-full">
            <img class="h-[200px] w-[200px]" src="{{ image_path }}" alt="">
        </div>
    </div>
</template>

<script lang='ts'>
import {defineComponent, ref} from 'vue';
export default defineComponent({
    setup() {
        
    },
    props : {
        title : String,
        body : String,
        image_path : String,
        vote : Number,
        created_at : Date,
        created_by: String,
    }
})
</script>