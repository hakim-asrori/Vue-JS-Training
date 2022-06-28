import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "../pages/Home.vue";

const routes = [
    {
        name: "Home",
        path: '/home',
        component: Home
    }
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes
});

export default router;
