<template>
  <div class="user-actions">
    <a href="#" @click.prevent="toggleDropdown">
      <img :src="avatar" class="avatar-32 round-image" alt="">
    </a>
    <div class="dropdown-menu" v-if="showDropdown">
      <ul class="user-dropdown-toggle">
        <li class="user-info">
          <router-link :to="{ name: 'user', params: { nickname } }">
            <span class="username">{{ username }}</span>
            <p class="nickname">@{{ nickname }}</p>
          </router-link>
        </li>
        <li class="dropdown-divider"></li>
        <li class="settings">
          <a href="#">Настройки</a>
        </li>
        <li class="logout">
          <a href="/#/logout" @click.prevent="logout">Выход</a>
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
      showDropdown: false,
    }
  },
  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
    },
    logout() {
      Auth.logout();
      window.location.replace('/');
    }
  }
}
</script>

<style lang="scss">
@import "../../../sass/variables";

$actions-color: #14171a;

.dropdown-menu {
  width: 225px;
  position: absolute;
  top: 100%;
  right: 0;
  z-index: 900;
  float: left;
  padding-top: 0.45rem;
  background: #fff;
  border-radius: 2px;
  box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);
  border: 1px solid hsla(220,6%,72%,.5);
  background-clip: padding-box;

  &:before {
    content: "";
    position: absolute;
    top: 0;
    right: 10%;
    width: 1rem;
    height: 1rem;
    border-top: 1px solid hsla(220,6%,72%,.5);
    border-left: 1px solid hsla(220,6%,72%,.5);
    background-color: #fff;
    transform: rotate(45deg) translate(-50%,-50%);
    transform-origin: 0 0;
  }
}

.user-dropdown-toggle {
  padding: 0;
  font-size: 1.1rem;

  .user-info {
    font-weight: bold;
    color: $nav-item-color;
    padding: 0.2rem 0.5rem;

    a {
      color: $nav-item-color;

      &:hover {
        color: $nav-item-color;
      }
    }

    .username {
      color: $actions-color;
    }

    .nickname {
      margin: 0.45rem 0;
      font-size: 1rem;
    }
  }

  .settings, .logout {
    padding: 0.5rem 0.6rem;
  }

  .dropdown-divider {
    border-bottom: 1px solid #e6ecf0;
  }

  li a {
    display: block;
    color: $actions-color;

    &:hover {
      color: $nav-active-color;
    }
  }
}

</style>