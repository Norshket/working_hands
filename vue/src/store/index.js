import { createStore } from 'vuex'
import Articles from "@/store/modules/articles";

export default createStore({
    modules: {
        articles: Articles,
    }
})