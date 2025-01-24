import axios from 'axios';

const apiClient = axios.create({
    baseURL: 'http://173.20.0.2/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

apiClient.interceptors.request.use((config) => {
    const token = localStorage.getItem('auth_token');
    if (token) {
        console.log(token)
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

export default apiClient;