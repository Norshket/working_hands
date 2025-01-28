import {$api} from "@/api";

const state = () => ({
    list: []
})
const mutations = {
    setList(state, data) {
        state.list = data
    }
}
const actions = {
    async getListArticles({commit}) {
        await $api.articles.index().then(({data}) => {
            commit('setList', data)
        }).catch((errors) => {
            console.log(errors)
        })
    },
}
const getters = {
    getList: state => state.list
}

export default {
    namespaced: true, state, mutations, actions, getters
}