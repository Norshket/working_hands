import {createRouter, createWebHistory} from 'vue-router'
import Articles from "@/router/routes/articles";
import Auth from "@/router/routes/auth";
import Home from "@/router/routes/home"
import Me from "@/router/routes/me";
import Users from "@/router/routes/users";
import store from "@/store";


const routes = [
    ...Home,
    ...Articles,
    ...Auth,
    ...Me,
    ...Users
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    const isAuthenticated = store.getters['auth/token'];

    if (to.meta.isAuth && !isAuthenticated) {
        next('/login');
    } else if ((to.path === '/login' || to.path === '/register') && isAuthenticated) {
        next('/');
    } else {
        next();
    }
});

export default router