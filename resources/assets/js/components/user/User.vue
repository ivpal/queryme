<template>
  <div>
    <div class="banner">
      <img :src="banner">
    </div>
    <div class="avatar">
      <img class="round-image avatar-150" :src="avatar">
    </div>
  </div>
</template>

<script>
import user from '../../api/user'

export default {
  data() {
    return {
        avatar: '',
        banner: '',
        username: '',
      }
    },
  mounted() {
    user.getInfo(this.$route.params.nickname)
      .then(response => {
        const data = response.data;
        this.avatar = data.avatar;
        this.banner = data.banner;
        this.username = data.username;
      })
      .catch(error => { console.log(error) })
  }
}
</script>

<style lang="scss">
@import "../../../sass/variables";

.banner {
  height: $banner-height;
  overflow: hidden;
  text-align: center;

  img {
    width: 100%;
  }
}

.avatar {
  position: absolute;
  top: 27%;
  left: 25%;

  img {
    border: 2px solid #fff;
  }
}
</style>