import { createApp } from "vue";
import Boot from './Boot.vue';
import router from './router';
import store from "./store";

const App = createApp({
        components : {
            Boot
        }
    })
    .use(router)
    .use(store)
    .mount('#app');