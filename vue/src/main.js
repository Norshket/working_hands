import {createApp} from 'vue'
import App from './App.vue'
import router from "@/router/router";
import '@coreui/coreui/dist/css/coreui.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import store from "./store";
import {$api} from "@/api";

import './assets/styles/index.css';


const app = createApp(App)


app.config.globalProperties.$api = $api;

app.use(router)
app.use(store)

app.mount('#app')