<template>
  <div class="main-header-box">
    <div class="main-header">
      <div class="container">
        <a href="#" class="logo">Queryme</a>

        <nav class="main-nav">
          <ul class="nav-list">
            <div class="main-nav-list">
              <li class="nav-item link-item">
                <a href="#">Популярное</a>
              </li>
            </div>
            <li class="nav-item">
              <span class="login" v-if="canShowLogin()" @click="showLoginWindow">Вход</span>
              <user-actions v-else></user-actions>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'

import * as auth from '../../helpers/auth'
import UserActions from './UserActions.vue'

Vue.component('user-actions', UserActions);

export default {
  methods: {
    canShowLogin() {
      return !auth.isAuth();
    },
    showLoginWindow() {
      this.$modal.show('login');
    }
  }
}
</script>

<style lang="scss">
@import "../../../sass/variables";

.main-header-box {
  position: relative;
}

.main-header {
  position: fixed;
  background: #fff;
  color: #909090;
  height: $header-height;
  z-index: 250;
  top: 0;
  left: 0;
  right: 0;
  transition: all .2s;
  border-bottom: 1px solid #f1f1f1;

  .container {
    height: 100%;
    display: flex;
    align-items: center;
  }
}

.logo {
  font-size: 1.6rem;
  margin-right: 2rem;
  color: $brand-primary;
}

.main-nav {
  height: 100%;
  flex: 1 0 auto;
}

.nav-list {
  margin: 0;
  height: 100%;
  display: flex;
  position: relative;
  align-items: center;
  justify-content: flex-end;
}

.main-nav-list {
  display: flex;
}
  
.nav-item {
  margin: 0;
  height: 100%;
  display: flex;
  color: $nav-item-color;
  cursor: pointer;
  padding: 0 1.5rem;
  font-size: 1.2rem;
  position: relative;
  align-items: center;
  justify-content: center;
}

.link-item a:hover {
  color: $nav-active-color;
}

.login {
  color: $nav-active-color;

  &:hover {
    color: $nav-auth-hover-color;
  }
}

</style>