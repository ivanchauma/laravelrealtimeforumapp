require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

import User from './Helpers/User'
window.User = User
//console.log(User.loggedIn());
//console.log(User.id())

window.EventBus = new Vue();

Vue.component('AppHome', require('./components/AppHome.vue').default);
import router from './Router/router.js'


//Register Routes
/*const routes = new VueRouter({
    router,
    mode: 'hash',

})
 */
const app = new Vue({
    vuetify : new Vuetify(),
    el: '#app',
    router
 });
