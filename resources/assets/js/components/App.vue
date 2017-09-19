<template>
  <div>
    <login-modal></login-modal>
    <nav-header></nav-header>
    <div class="container">
      <div class="row">

        <router-view></router-view>

      </div>
    </div>
  </div>
</template>

<script>

import LoginModal from './LoginModal.vue'
import NavHeader from './header/NavHeader.vue'

export default {
  components: { LoginModal, NavHeader }
}
</script>