import BaseApi from "@/api/BaseApi";

class TagsApi extends BaseApi {

    url = 'tags'

    index() {
        return this.api().get(`${this.url}`)
    }

}

export default TagsApi