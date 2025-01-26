import {$api} from "@/api";
import router from "@/router/router";


const state = () => ({
    user: localStorage.getItem('auth_user'),
    token: localStorage.getItem('auth_token')
})

const mutations = {

    auth(state, data) {
        state.user = data.user
        state.token = data.access_token
    },

    logout(state) {
        state.user = null
        state.token = null
    }

}
const actions = {
    async register({commit}, form) {
        await $api.auth.register(form).then(({data}) => {
            localStorage.setItem('auth_token', data.access_token);
            commit('auth', data)
            router.push('/articles');
        }).catch((errors) => {
            console.log(errors)
        })
    },

    async login({commit}, form) {
        await $api.auth.login(form).then(({data}) => {

            localStorage.setItem('auth_token', data.access_token);
            commit('auth', data)
            router.push('/articles');
        })
            .catch(error => {
                console.log(error)
            })
    },

    async logout({commit}) {

        await $api.auth.logout().then(() => {
            commit('logout')

            localStorage.removeItem('auth_user')
            localStorage.removeItem('auth_token')

            router.push('/login')

        })
            .catch(error => {
                console.log(error)
            })
    },
}
const getters = {
    isAuth: state => state.token !== null,
    access: state => (...accesses) => hasAccess(state.token, ...accesses)
}


const hasAccess = (token, accesses) => {
    if (token !== null && accesses.includes('auth')) {
        return true;
    }

    return token === null && accesses.includes('guest')
}

export default {
    namespaced: true, state, mutations, actions, getters
}