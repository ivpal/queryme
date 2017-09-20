<template>
  <div class="user-actions">
    <a href="#" class="menu-dropdown">
      <img :src="avatar" class="avatar-32" alt="">
    </a>
  </div>
</template>

<script>
import { getAvatarUrl, getNickname } from '../../services/User'

export default {
  data() {
    return {
      avatar: getAvatarUrl(),
    }
  }
}
</script>

<style lang="scss">
.avatar-32 {
  width: 32px;
  height: 32px;
}

.user-actions {
  .menu-dropdown {
    border-radius: 50%;
  }
}

</style>