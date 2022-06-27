import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Login from "../pages/auth/Login.vue";

const routes = [
    {
        name: "Login",
        path: "/",
        component: Login
    }
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes
});

export default router;
