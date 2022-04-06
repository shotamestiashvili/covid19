require('./bootstrap');

import {createApp} from "vue";
import store  from './store/store';
import router from "./router";
import App from'./components/App.vue';
import i18n from './i18n';


const app = createApp({});
app.use(store)
app.use(router)
app.use(i18n)


app.component('app', App);

app.mount('#app');
