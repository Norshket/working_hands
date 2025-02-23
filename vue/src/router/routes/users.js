export default [
    {
        path: '/users',
        component: () => import('../../view/index.vue'),

        children: [
            {
                path: '',
                name: 'users',
                component: () => import('../../view/users/ListArticle.vue'),
                meta: {isAuth: true, layout: 'DefaultLayout'},
            },

            {
                path: '/users/create',
                name: 'users.create',
                component: () => import('../../view/users/CreateUser.vue'),
                meta: {isAuth: true, layout: 'DefaultLayout'}
            },
            {

                path: '/users/:id/edit',
                name: 'users.edit',
                component: () => import('../../view/users/EditUser.vue'),
                meta: {isAuth: true, layout: 'DefaultLayout'}
            },

        ]


    },
]