import {$api} from "@/api";

const state = () => ({})
const mutations = {}
const actions = {
    async getListArticles() {
        await $api.articles.index().then(({data}) => {
            console.log(data)

        }).catch((errors) => {
            console.log(errors)
        })
    },
}
const getters = {}

export default {
    namespaced: true, state, mutations, actions, getters
}