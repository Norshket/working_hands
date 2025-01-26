import { createStore } from 'vuex'
import Articles from "@/store/modules/articles";
import Auth from "@/store/modules/auth";

export default createStore({
    modules: {
        articles: Articles,
        auth: Auth,
    }
})