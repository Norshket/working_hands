import AuthApi from "@/api/AuthApi";
import ArticlesApi from "@/api/ArticlesApi";
import ArticleCommentsApi from "@/api/ArticleCommentsApi";
import HomeApi from "@/api/HomeApi";
import TagsApi from "@/api/TagsApi";
import UsersApi from "@/api/UsersApi";
export const $api = {
    auth: new AuthApi(),
    articles: new ArticlesApi(),
    articleComments: new ArticleCommentsApi(),
    home: new HomeApi(),
    tags: new TagsApi(),
    users: new UsersApi()
}