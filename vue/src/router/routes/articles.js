export default [
    {
        path: '/articles',
        component: () => import('../../view/index.vue'),

        children:[
            {
                path: '',
                name: 'articles.index',
                component: () => import('../../view/articles/ListArticle.vue'),
                meta: {isAuth: false, layout: 'DefaultLayout'},
            },

            {
                path: ':id/show',
                name: 'articles.show',
                component: () => import('../../view/articles/ShowArticle.vue'),
                meta: {isAuth: false, layout: 'DefaultLayout'},
            }
        ]
    },


]