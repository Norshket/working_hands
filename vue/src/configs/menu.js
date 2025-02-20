export const AUTH = 'auth'
export const GUEST = 'guest'

export default [
    {
        key: 'menu.home',
        text: 'Home',
        link: {name: 'home'},
        accesses: [GUEST, AUTH]
    },
    {
        key: 'menu.articles',
        text: 'Articles',
        link: {name: 'articles.index'},
        accesses: [GUEST, AUTH]
    },
    {
        key: 'menu.register',
        text: 'Register',
        link: {name: 'register'},
        accesses: [GUEST]
    },
    {
        key: 'menu.login',
        text: 'Login',
        link: {name: 'login'},
        accesses: [GUEST]
    },
    {
        key: 'me.articles',
        text: 'My Articles',
        link: {name: 'me.articles'},
        accesses: [AUTH],
        // visibility :
    },

]