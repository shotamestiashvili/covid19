require('./bootstrap');

import {createApp} from "vue";
import store  from './store/store';
import router from "./router";
import App from'./components/App.vue';

const app = createApp({});
app.use(store)
app.use(router)



app.component('app', App);

app.mount('#app');
