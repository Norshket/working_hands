import {$api} from "@/api";
import router from "@/router/router";


const state = () => ({
    user: {
        id: 0,
        name: '',
        email: '',
        created_at: '',
        updated_at: ''
    },
    token: null
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
            commit('auth', data)
            router.push('/articles');
        }).catch((errors) => {
            console.log(errors)
        })
    },

    async login({commit}, form) {
        await $api.auth.login(form).then(({data}) => {
            commit('auth', data)
            router.push('/articles');
        })
            .catch(error => {
                console.log(error)
            })
    },

    async logout({commit}) {
        await $api.auth.logout().then(() => {
            router.push('/login')
            commit('logout')
        })
            .catch((error) => {
                console.log(error)
            })
    },
}
const getters = {
    isAuth: state => state.token !== null,
    user: state => state.user,
    token: state => state.token,
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