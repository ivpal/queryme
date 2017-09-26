<template>
  <div>
    <login-modal></login-modal>
    <nav-header></nav-header>
    <div class="container main-container">
        <router-view></router-view>
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

<style lang="scss">
@import "../../sass/variables";

.main-container {
  position: relative;
  top: $header-height;
}

</style>