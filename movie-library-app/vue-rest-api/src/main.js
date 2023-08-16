import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

const app = createApp(App)

app.config.globalProperties.APIBaseUrlStorage = "http://localhost:8000/storage/";

app.use(router)

app.mount('#app')
