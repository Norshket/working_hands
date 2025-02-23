import {createApp} from 'vue'
import App from './App.vue'
import router from "@/router/router";
import '@coreui/coreui/dist/css/coreui.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import store from "./store";
import Toast, {POSITION} from "vue-toastification";
import {$api} from "@/api";

import "@/subscribers/auth"


import './assets/styles/index.css';
import "vue-toastification/dist/index.css";


const app = createApp(App)

app.config.globalProperties.$api = $api;

app.use(router)
app.use(store)
app.use(Toast, {position: POSITION.BOTTOM_RIGHT})
app.mount('#app')