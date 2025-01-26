import axios from "axios";

class BaseApi {

    apiUrl = 'http://173.20.0.2/api'
    headers = {
        'Content-Type': 'application/json',
    }
    apiClient

    constructor(apiUrl = null, headers = null) {
        this.apiClient = axios.create({
            baseURL: apiUrl ?? this.apiUrl,
            headers: headers ?? this.headers,
        });

        this.setupInterceptions()
    }

    setupInterceptions() {
        this.apiClient.interceptors.request.use((config) => {
            const token = localStorage.getItem('auth_token');
            if (token) {
                config.headers.Authorization = `Bearer ${token}`;
            }
            return config;
        });
    }

    api() {
        return this.apiClient
    }

}

export default BaseApi