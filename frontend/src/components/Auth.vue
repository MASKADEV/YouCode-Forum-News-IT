<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
 
  <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
         <router-view></router-view>

    </div>
  </div>

</template>

<script>
import { LockClosedIcon } from '@heroicons/vue/solid'

export default {
    name:"Auth",
  components: {
    LockClosedIcon,
  },
}
</script>