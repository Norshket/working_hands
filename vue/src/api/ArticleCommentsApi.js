import BaseApi from "@/api/BaseApi";

class ArticleCommentsApi extends BaseApi {

    url = 'articles'

    index(articleId, params = {limit: 2, offset: 0}) {
        return this.api().get(`${this.url}/${articleId}/comments`, {params: params})
    }

    create(articleId, data) {
        return this.api().post(`${this.url}/${articleId}/comments`, data)
    }

}

export default ArticleCommentsApi