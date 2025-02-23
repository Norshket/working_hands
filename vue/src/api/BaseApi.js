import axios from "axios";
import store from "@/store";
import router from "@/router/router";
import toast from "@/widgets/toaster";

class BaseApi {

    apiUrl = 'http://173.20.0.2/api'
    headers = {
        'Content-Type': 'application/json',
    }
    #apiClient

    constructor(apiUrl = null, headers = null) {
        this.apiClient = axios.create({
            baseURL: apiUrl ?? this.apiUrl,
            headers: headers ?? this.headers,
        });

        this.setupInterceptionsRequest()
        this.setupInterceptionsResponse()
    }

    setupInterceptionsRequest() {
        this.apiClient.interceptors.request.use((config) => {
            const token = store.getters['auth/token'];
            if (token) {
                config.headers.Authorization = `Bearer ${token}`;
            }
            return config;
        });
    }

    setupInterceptionsResponse() {
        this.apiClient.interceptors.response.use((response) => {
            return response;
        }, (error) => {
            if (error.status === 401) {
                store.commit('auth/logout')
                router.push('/login');
            }
            if (error.status === 403) {
                toast.error("тебе здесь не рады")
                router.back();
            }
            if (error.status === 500 || error.code === "ERR_NETWORK") {
                toast.error("чирик @#$^*?! кукук !!!")
            }

            return Promise.reject(error);
        });
    }

    api() {
        return this.apiClient
    }

}

export default BaseApi