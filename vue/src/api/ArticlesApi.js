import BaseApi from "@/api/BaseApi";

class ArticlesApi extends BaseApi {

    url = 'articles'

    index(params) {
        return this.api().get(`${this.url}/`, {params: params})
    }

    create(data) {
        return this.api().post(`${this.url}/`, data)
    }

    show(id) {
        return this.api().get(`${this.url}/${id}/show`)
    }

    update(id, data) {
        return this.api().put(`${this.url}/${id}`, data)
    }

    delete(id) {
        return this.api().delete(`${this.url}/${id}`)
    }
}

export default ArticlesApi