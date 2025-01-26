import BaseApi from "@/api/BaseApi";

class HomeApi extends BaseApi {

    index() {
        return this.api().get(`/main`)
    }

}

export default HomeApi