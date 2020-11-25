import Vue from 'vue'
import VueRouter from 'vue-router'

//importing Components for router
import AppLogin from '../components/AppLogin.vue';

Vue.use(VueRouter)


const routes = [
    { path: '/login', component: AppLogin },
    //{ path: '/bar', component: Bar }
  ]


  const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
  })


  export default router
