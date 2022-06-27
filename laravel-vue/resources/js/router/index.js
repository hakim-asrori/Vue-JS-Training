window.Vue = require("vue").default;

import VueRouter from "vue-router";
Vue.use(VueRouter);

const Home = require("../pages/Home.vue").default;
const About = require("../pages/About.vue").default;

import NotFound from "../pages/NotFound.vue";
import User from "../pages/User.vue";
import Register from "../pages/Register.vue";
import Edit from "../pages/Edit.vue";
import Profile from "../pages/Profile.vue";
import UploadFoto from "../pages/UploadFoto.vue";

const routes = [
    {
        name: "Home",
        path: "/home",
        component: Home,
    },
    {
        name: "About",
        path: "/about",
        component: About,
    },
    {
        name: "User",
        path: "/user",
        component: User,
    },
    {
        name: "Register",
        path: "/user/create",
        component: Register,
    },
    {
        name: "Profile",
        path: "/user/:id",
        component: Profile,
        props: true,
    },
    {
        name: "Upload",
        path: "/user/:id/foto",
        component: UploadFoto,
        props: true,
    },
    {
        name: "Edit",
        path: "/user/:id/edit",
        component: Edit,
        props: true,
    },
    {
        path: "*",
        component: NotFound,
    },
];

const router = new VueRouter({
    linkActiveClass: "active",
    mode: "history",
    routes,
});

export default router;
