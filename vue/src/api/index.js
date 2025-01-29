// import axios from 'axios';
import AuthApi from "@/api/AuthApi";
import ArticlesApi from "@/api/ArticlesApi";
import ArticleCommentsApi from "@/api/ArticleCommentsApi";
import HomeApi from "@/api/HomeApi";
export const $api = {
    auth: new AuthApi(),
    articles: new ArticlesApi(),
    articleComments: new ArticleCommentsApi(),
    home: new HomeApi()
}