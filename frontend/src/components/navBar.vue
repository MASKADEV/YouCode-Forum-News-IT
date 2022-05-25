<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->
  <div class="min-h-full">

    <Disclosure as="nav" class="bg-gray-800" v-slot="{ open }">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">

              <img class="h-8 w-8" src="https://upload.wikimedia.org/wikipedia/commons/9/93/Taskful_Logo.svg"
                alt="Workflow" />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">

                <router-link :to="'/HomePage'" v-if="userss"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">home
                </router-link>
                <router-link :to="'/ProfileUser'" v-if="userss"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                  Profile</router-link>
                <router-link :to="'/dashboardAdmin'" v-if="admin"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                  dashboard</router-link>
                <router-link :to="'/Allusers'" v-if="admin"
                  class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                  users
                </router-link>


              </div>
            </div>
          </div>
          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">


              <!-- Profile dropdown -->
              <Menu as="div" class="ml-3 relative">
                <div>
                  <MenuButton
                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full" alt="" />
                  </MenuButton>
                </div>
                <transition enter-active-class="transition ease-out duration-100"
                  enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100"
                  leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100"
                  leave-to-class="transform opacity-0 scale-95">
                  <MenuItems
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <MenuItem v-slot="{ active }">
                    <a @click="logout" :class="['block px-4 py-2 text-sm text-gray-700 cursor-pointer']">
                      Sign out</a>
                    </MenuItem>
                  </MenuItems>
                </transition>
              </Menu>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton
              class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open main menu</span>
              <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>

          </div>
        </div>
      </div>

      <DisclosurePanel class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">

          <!-- <router-link v-for="item in navigation" :key="item.name" as="a" :to="item.to"
            active-class="bg-gray-900 text-white"
            :class="[this.$route.name === item.to.name ? '' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']">
            {{ item.name }}

                </router-link> -->
          <router-link :to="'/HomePage'" v-if="userss"
            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2block px-3 py-2 rounded-md text-base font-medium">
            home
          </router-link>
          <router-link :to="'/ProfileUser'" v-if="userss"
            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 block px-3 py-2 rounded-md text-base font-medium">
            Profile</router-link> 
          <router-link :to="'/dashboardAdmin'" v-if="admin"
            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 block px-3 py-2 rounded-md text-base font-medium">
            dashboard
          </router-link>
          <router-link :to="'/users'" v-if="admin"
            class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 block px-3 py-2 rounded-md text-base font-medium">
            users
          </router-link>
        </div>
        <div class="pt-4 pb-3 border-t border-gray-700">
          <div class="flex items-center px-5">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" alt="" />
            </div>
            <div class="ml-3">
              <div class="text-base font-medium leading-none text-white">{{ user.name }}</div>
              <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div>
            </div>
            <button type="button"
              class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <BellIcon class="h-6 w-6" aria-hidden="true" />
            </button>
          </div>
          <div class="mt-3 px-2 space-y-1">
            <DisclosureButton as="a" @click="logout"
              class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 cursor-pointer">
              Sign out</DisclosureButton>
          </div>
        </div>

      </DisclosurePanel>
    </Disclosure>


    <router-view></router-view>

  </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'
import { computed } from '@vue/reactivity'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'
import store from "../store";


// const user={}
// const user = {
//   id: "12",
//   name: "a",
//   nom: "othman",
//   prenom: "rrrt",
//   email: "aaaa",
//   date_naissance: "2201-01-01",
//   age: 12,
//   imageUrl:
//     'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
// }



export default {
  name: "navBar",
  data() {
    return {
      admin:sessionStorage.getItem("TOKEN_ADMIN"),
      userss:sessionStorage.getItem("TOKEN")

    }
  },
  components: {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    BellIcon,
    MenuIcon,
    XIcon,
  },
  methods: {

    logout() {
      store.commit('logout');
      router.push({
        name: 'Login'
      })
      console.log("ok");

    }
  },
  mounted() {
    console.log( "hada"+this.userss);
    console.log(this.$parent.$options.name);


  },
  setup() {
    const store = useStore();
    const router = useRouter();
    // console.log(this.$parent.$options.name)
    function test() {
      console.log("ok");

    }
    return {

      user: computed(() => store.state.user.data),
    }
  },
}
</script>