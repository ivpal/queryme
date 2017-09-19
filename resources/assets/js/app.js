require('./bootstrap');

import vmodal from 'vue-js-modal';
import VueRouter from 'vue-router'

// TODO: сделать ленивую загрузку компонентов

import User from './components/user/User.vue'

Vue.component('nav-header', require('./components/NavHeader.vue'));
Vue.component('login-modal', require('./components/LoginModal.vue'));
Vue.component('user', User);

Vue.use(VueRouter);
Vue.use(vmodal);

const router = new VueRouter({
  routes: [
    { path: '/:nickname', component: User }
  ]
});

const app = new Vue({
  el: '#app',
  router
});
