export default [
    {
        path: '/',
        name: 'home',
        component: () => import('../../view/HomeView.vue'),
        meta: {isAuth: false, layout: 'DefaultLayout'}
    },
]