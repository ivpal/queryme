require('./bootstrap');

import vmodal from 'vue-js-modal';

Vue.component('nav-header', require('./components/NavHeader.vue'));
Vue.component('login-modal', require('./components/LoginModal.vue'));

Vue.use(vmodal);

const app = new Vue({
    el: '#app'
});
