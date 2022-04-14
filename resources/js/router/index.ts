import {RouteRecordRaw ,createRouter, createWebHistory} from "vue-router"

const routes: Array<RouteRecordRaw> = [
    {
        path: "/",
        name: "Home",
        component: () => import("../componenets/home/Home.vue")
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("../componenets/auth/login/Login.vue")
    },
];

const router = createRouter ({
    history: createWebHistory(process.env.BASE_URL),
    routes
});

export default router