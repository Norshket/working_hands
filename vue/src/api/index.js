import axios from 'axios';
import AuthApi from "@/api/AuthApi";
import ArticlesApi from "@/api/ArticlesApi";

const apiClient = axios.create({
    baseURL: 'http://173.20.0.2/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

apiClient.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default apiClient;

export const $api = {
    auth: new AuthApi(),
    articles: new ArticlesApi()
}