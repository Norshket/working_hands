import {createMemoryHistory, createRouter} from 'vue-router'
import Articles from "@/router/routes/articles";
import Auth from "@/router/routes/auth";

import HomeView from '../view/HomeView.vue'

const routes = [
    {path: '/', name: 'home', component: HomeView},
    ...Articles,
    ...Auth

]

const router = createRouter({
    history: createMemoryHistory(),
    routes,
})

export default router