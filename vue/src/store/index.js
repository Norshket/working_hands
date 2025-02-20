import {createStore} from 'vuex'
import Auth from "@/store/modules/auth";
import createPersistedState from 'vuex-persistedstate';

export default createStore({
    modules: {
        auth: Auth,
    },
    plugins: [createPersistedState()]
})