require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)


Vue.component('AppHome', require('./components/AppHome.vue').default);
 const app = new Vue({
    vuetify : new Vuetify(),
    el: '#app',
 });
