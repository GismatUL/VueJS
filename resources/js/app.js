require('./bootstrap');

import { createApp } from 'vue';

import MainApp from './components/mainApp.vue';

const app = createApp(MainApp);

app.component('mainApp', MainApp);

app.mount('#app',router);
