import {createStore} from 'vuex'
import Articles from "@/store/modules/articles";
import Auth from "@/store/modules/auth";
import createPersistedState from 'vuex-persistedstate';

export default createStore({
    modules: {
        articles: Articles,
        auth: Auth,
    },
    plugins: [createPersistedState()]
})