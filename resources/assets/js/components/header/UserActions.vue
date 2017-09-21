<template>
  <div class="user-actions">
    <a href="#">
      <img :src="avatar" class="avatar-32 round-image" alt="">
    </a>
    <div class="dropdown-menu">
      <ul class="user-dropdown-toggle">
        <li class="user-info">
          <router-link :to="{ name: 'user', params: { nickname } }">
            <span>{{ username }}</span>
            <p>@{{ nickname }}</p>
          </router-link>
        </li>
        <li class="profile"></li>
        <li class="logout" @click.prevent="logout">
          <span>Выход</span>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import * as Auth from '../../services/Auth'
import { getAvatarUrl, getNickname, getUsername } from '../../services/User'

export default {
  data() {
    return {
      avatar: getAvatarUrl(),
      nickname: getNickname(),
      username: getUsername(),
    }
  },
  methods: {
    logout(e) {
      Auth.logout();
      window.location.replace('/');
    }
  }
}
</script>

<style lang="scss">

.dropdown-menu {
  position: absolute;
  top: 100%;
  right: 0;
  z-index: 900;
  float: left;
  padding: 10px 0;
  margin: 2px 0 0;
  background: #fff;
  border-radius: 2px;
  box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);
  border: 1px solid hsla(220,6%,72%,.5);
  background-clip: padding-box;
}
</style>