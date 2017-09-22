require('./bootstrap');

import vmodal from 'vue-js-modal';
import VueRouter from 'vue-router'

import App from './components/App.vue'

// TODO: сделать ленивую загрузку компонентов

import User from './components/user/User.vue'

Vue.component('user', User);

Vue.use(VueRouter);
Vue.use(vmodal);

const router = new VueRouter({
  routes: [
    { path: '/:nickname', component: User, name: 'user' }
  ]
});

new Vue({
  el: '#app',
  render: h => h(App),
  router
});
