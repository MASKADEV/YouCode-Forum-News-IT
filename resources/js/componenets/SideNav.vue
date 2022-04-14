<template lang="">
   <div class ="w-[20rem] bg-gray-100 h-full mt-11 md:fixed absolute md:left-[0rem] left-[-50rem]">
       <div class ="pl-3 flex flex-col ">
           <div class ="mt-2 mr-4 w-[90%] bg-white rounded-xl px-3">
               <input type="text" placeholder = "Search" class="outline-0 py-2 w-[100%] text-[15px] rounded-md">
           </div>
           <nav class =" mt-11">
               <ul>
                   <li class="py-2 my-2 ml-3  font-medium font-[Poppins] hover:cursor-pointer hover:font-bold">
                       <div class="flex flex-row items-center">
                            <ion-icon name="home-outline"></ion-icon>
                            <h3 class="px-3">Home</h3>
                        </div>
                    </li>
                   <li class="py-2 my-2 ml-3 mt-4 font-medium font-[Poppins] hover:cursor-pointer hover:font-bold">
                       <div class="flex flex-row items-center">
                            <ion-icon name="trending-up-outline"></ion-icon>
                            <h3 class="px-3">Most Pupolar</h3>
                        </div>
                    </li>
                   <li class="py-2 my-2 ml-3 mt-4 font-medium font-[Poppins] hover:cursor-pointer hover:font-bold">
                       <div class="flex flex-row items-center">
                            <ion-icon name="globe-outline"></ion-icon>
                            <h3 class="px-3">Recent</h3>
                        </div>
                    </li>
                   <li class="py-2 my-2 ml-3 mt-4 font-medium font-[Poppins] hover:cursor-pointer hover:font-bold">
                       <div class="flex flex-row items-center">
                            <ion-icon name="person-outline"></ion-icon>
                            <h3 class="px-3">Profile</h3>
                        </div>
                    </li>
                   <li class="py-2 my-2 ml-3 mt-4 font-medium font-[Poppins] hover:cursor-pointer hover:font-bold">
                       <div class="flex flex-row items-center">
                            <ion-icon name="settings-outline"></ion-icon>
                            <h3 class="px-3">Setting</h3>
                        </div>
                    </li>
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