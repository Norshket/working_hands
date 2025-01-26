export default [
    {
        path: '/register',
        name: 'register',
        component: () => import('../../view/auth/RegisterView.vue'),
        meta: {isAuth: false, layout: 'AuthLayout'}
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../../view/auth/LoginView.vue'),
        meta: {isAuth: false, layout: 'AuthLayout'}

    },
    // {
    //     path: '/profile',
    //     name: 'profile',
    //     component: () => import('../../view/auth/ProfileView.vue'),
    //     meta: {isAuth: true}
    // }
]