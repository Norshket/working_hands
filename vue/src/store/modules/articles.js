import axios from "axios";
import apiClient from "@/api";

const state = () => ({
    api: {
        listArticles: 'articles'
    }
})
const mutations = {}
const actions = {
    async getListArticles() {
        await apiClient.get('/articles', this.form).then((data) => {
            console.log(data)
        }).catch((errors) => {
            console.log(errors)
        })

        // await axios.get(url).then((data) => {
        //     console.log(data)
        // }).catch((errors) => {
        //     console.log(errors)
        // })
    },
}
const getters = {  }

export default {
    namespaced: true, state, mutations, actions, getters
}