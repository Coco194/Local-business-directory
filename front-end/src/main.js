import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";
import axios from 'axios';
import VueSelect from 'vue3-select'
import 'vue3-select/dist/vue3-select.css'

// Configure Axios
axios.defaults.baseURL = 'http://127.0.0.1:8000/api';
const storagePath = 'http://127.0.0.1:8000/storage/';
// Create the app instance
const app = createApp(App);

// Add Axios to global properties
app.config.globalProperties.$axios = axios;

// Attach it to global properties
app.config.globalProperties.$storagePath = storagePath;

// Use router and mount the app
app.use(router, VueSelect).mount('#app');