export default [
    {
        path: '/register',
        name: 'register',
        component: () => import('../../view/auth/RegisterView.vue'),
    },
    {
        path: '/login',
        name: 'login',
        component: () => import('../../view/auth/LoginView.vue'),
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