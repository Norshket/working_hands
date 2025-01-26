import BaseApi from "@/api/BaseApi";

class AuthApi extends BaseApi {
    login(data) {
        return this.api().post('/login', data)
    }

    register(data) {
        return this.api().post('/register', data)
    }

    logout() {
        return this.api().get('/logout')
    }
}

export default AuthApi