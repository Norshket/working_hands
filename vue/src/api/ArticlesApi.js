import BaseApi from "@/api/BaseApi";

class ArticlesApi extends BaseApi {

    url = 'articles'

    index(params) {
        return this.api().get(`${this.url}/`, {params: params})
    }

    create(data) {
        let config = {headers: {'Content-Type': 'multipart/form-data'}}
        return this.api().post(`${this.url}/`, data, config)
    }

    getCreateData() {
        return this.api().get(`${this.url}/create`)
    }

    getEditData(id) {
        return this.api().get(`${this.url}/${id}/edit`)
    }

    show(id) {
        return this.api().get(`${this.url}/${id}`)
    }

    update(id, data) {
        let config = {headers: {'Content-Type': 'multipart/form-data'}}
        data._method = 'put'
        return this.api().post(`${this.url}/${id}`, data, config)
    }

    delete(id) {
        return this.api().delete(`${this.url}/${id}`)
    }
}

export default ArticlesApi