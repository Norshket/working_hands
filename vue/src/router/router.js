import {createRouter, createWebHistory} from 'vue-router'
import Articles from "@/router/routes/articles";
import Auth from "@/router/routes/auth";
import Home from "@/router/routes/home"


const routes = [
    ...Home,
    ...Articles,
    ...Auth
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('auth_token');

    if (to.meta.isAuth && !isAuthenticated) {
        next('/login');
    } else if ((to.path === '/login' || to.path === '/register') && isAuthenticated) {
        next('/');
    } else {
        next();
    }
});

export default router