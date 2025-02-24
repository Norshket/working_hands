export const AUTH = 'auth'
export const GUEST = 'guest'

export default [
    {
        key: 'menu.home',
        text: 'Home',
        link: {name: 'home'},
        accesses: [GUEST, AUTH],
        visibility: []
    },
    {
        key: 'menu.articles',
        text: 'Articles',
        link: {name: 'articles.index'},
        accesses: [GUEST, AUTH],
        visibility: []
    },
    {
        key: 'menu.register',
        text: 'Register',
        link: {name: 'register'},
        accesses: [GUEST],
        visibility: []
    },
    {
        key: 'menu.login',
        text: 'Login',
        link: {name: 'login'},
        accesses: [GUEST],
        visibility: []
    },
    {
        key: 'me.articles',
        text: 'My Articles',
        link: {name: 'me.articles'},
        accesses: [AUTH],
        visibility: ['articles_create']
    },
    {
        key: 'users',
        text: 'Users',
        link: {name: 'users'},
        accesses: [AUTH],
        visibility: ['users_read']
    },

]