require('./bootstrap');

import { createApp } from 'vue';
import MainApp from './components/mainApp.vue';
import router from "./router";
const app = createApp(MainApp);

app.component('mainApp', MainApp);

app.mount('#app',router);
