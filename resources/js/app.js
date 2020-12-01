import vue from 'vue';
import router from './route.js'
require('./bootstrap');
import VueSweetalert2 from 'vue-sweetalert2';

import Axios from 'axios'

Vue.prototype.$http = Axios;
const token = localStorage.getItem('token')
if (token) {
    Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}


Vue.use(VueSweetalert2);
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

window.Vue = require('vue');

import App from './App.vue'


const app = new Vue({
    el: '#app',

    router,

    components:{ App}});
