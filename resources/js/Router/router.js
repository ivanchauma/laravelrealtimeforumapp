import Vue from 'vue'
import VueRouter from 'vue-router'

//importing Components for router
import AppLogin from '../components/AppLogin';
import AppLogout from '../components/AppLogout';
import AppSignUp from '../components/AppSignUp';
import AppForum from '../components/AppForum';
import Read from '../components/forum/read';
import Create from '../components/forum/create';

Vue.use(VueRouter)


const routes = [
    { path: '/login', component: AppLogin },
    { path: '/logout', component: AppLogout},
    { path: '/signup', component: AppSignUp},
    { path: '/forum', component: AppForum, name:'forum'},
    { path: '/question/:slug', component: Read, name:'read'},
    { path: '/ask', component: Create, name:'ask'},
    //{ path: '/bar', component: Bar }
  ]


  const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history'
  })


  export default router
