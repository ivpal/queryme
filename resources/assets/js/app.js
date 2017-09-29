require('./bootstrap');

import Vuex from 'vuex'
import vmodal from 'vue-js-modal';
import VueRouter from 'vue-router'

import App from './components/App.vue'

// TODO: сделать ленивую загрузку компонентов

import User from './components/user/User.vue'
import UserReplies from './components/user/UserReplies.vue'
import UserQuestions from './components/user/UserQuestions.vue'
import LikedQuestions from './components/user/LikedQuestions.vue'

Vue.component('user', User);

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(vmodal);

const router = new VueRouter({
  // mode: 'history',
  routes: [
    { path: '/:nickname', component: User,
      children: [
        {
          path: '',
          name: 'userHome',
          component: UserReplies
        },
        {
          path: 'questions',
          name: 'userQuestions',
          component: UserQuestions
        },
        {
          path: 'likes',
          name: 'userLikedQuestions',
          component: LikedQuestions
        }
      ]
    }
  ]
});

new Vue({
  el: '#app',
  render: h => h(App),
  router
});
