export default [
    {
        path: '/articles',
        name: 'articles.index',
        component: () => import('../../view/articles/ListArticle.vue'),
    },
    // {
    //     path: '/articles/create',
    //     name: 'articles.create',
    //     component: () => import('../../view/articles/CreateArticle.vue'),
    // },
    // {
    //     path: '/articles/:id/edit',
    //     name: 'articles.edit',
    //     component: () => import('../../view/articles/EditArticle.vue'),
    // },
    // {
    //     path: '/articles/show',
    //     name: 'articles.create',
    //     component: () => import('../../view/articles/ShowArticle.vue'),
    // }
]