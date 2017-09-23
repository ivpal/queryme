<template>
  <div class="banner">
    <img :src="banner">
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
.banner {
  height: 320px;
  overflow: hidden;
  text-align: center;

  img {
    width: 100%;
  }
}
</style>