export default [
    {
        path: '/me',
        component: () => import('../../view/index.vue'),

        children: [
            {
                path: '/me/articles',
                component: () => import('../../view/index.vue'),

                children: [
                    {
                        path: '/me/articles',
                        name: 'me.articles',
                        component: () => import('../../view/me/articles/ListArticle.vue'),
                        meta: {isAuth: true, layout: 'DefaultLayout'},
                    },

                    {
                        path: '/me/articles/create',
                        name: 'me.articles.create',
                        component: () => import('../../view/me/articles/CreateArticle.vue'),
                        meta: {isAuth: true, layout: 'DefaultLayout'}
                    },
                    {

                        path: '/me/articles/:id/edit',
                        name: 'me.articles.edit',
                        component: () => import('../../view/me/articles/EditArticle.vue'),
                        meta: {isAuth: true, layout: 'DefaultLayout'}
                    },

                ]
            }
        ]
    },
]