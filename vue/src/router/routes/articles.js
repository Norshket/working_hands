export default [
    {
        path: '/articles',
        name: 'articles.index',
        component: () => import('../../view/articles/ListArticle.vue'),
        meta: {isAuth: false, layout: 'DefaultLayout'}
    },
    {
        path: '/articles/create',
        name: 'articles.create',
        component: () => import('../../view/articles/CreateArticle.vue'),
        meta: {isAuth: true, layout: 'DefaultLayout'}
    },
    {
        path: '/articles/show',
        name: 'articles.create',
        component: () => import('../../view/articles/ShowArticle.vue'),
        meta:{ layout: 'DefaultLayout'}
    }
]