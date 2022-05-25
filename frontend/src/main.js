 import { createApp } from 'vue'
import router from './router'
import store from './store'
import App from './App.vue'
import axios from "axios";
import 'flowbite';

import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';
import './index.css'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(far,fas);

createApp(App)
.component("FIcons",FontAwesomeIcon)
.use(store)
.use(router)
.mount('#app')
