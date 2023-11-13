require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router'

import ExampleComponent from "./components/ExampleComponent";
import AboutComponent from "./components/AboutComponent";

const routes = [
    {path: '/', component:ExampleComponent},
    {path: '/about', component:AboutComponent},
];
const router = VueRouter.createRouter({
    history: VueRouter.
})
const app = createApp({});

app.component('example-component',ExampleComponent)
app.mount("#app")
