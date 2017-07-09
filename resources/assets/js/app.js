require('./bootstrap');

Vue.component('nav-header', require('./components/NavHeader.vue'));

const app = new Vue({
    el: '#app'
});
