<template>
  <div class="user">
    <div class="user-profile">
      <div class="banner">
        <router-link :to="{ name: 'user', params: { nickname } }" :style="bannerStyle">
        </router-link>
      </div>
      <div class="avatar">
        <router-link :to="{ name: 'user', params: { nickname } }">
          <img class="avatar-96 round-image" :src="avatar">
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import user from '../../api/user'

export default {
  data() {
    return {
      avatar: '',
      username: '',
      description: '',
      following_count: 0,
      followers_count: 0,
      nickname: this.$route.params.nickname,
      bannerStyle: {
        backgroundImage: ''
      }
    }
  },
  mounted() {
    user.getInfo(this.$route.params.nickname)
      .then(response => {
        const data = response.data;
        this.avatar = data.avatar;
        this.username = data.username;
        this.description = data.description;
        this.following_count = data.following_count;
        this.followers_count = data.followers_count;
        this.bannerStyle.backgroundImage = `url(${data.banner})`;
      })
      .catch(error => { console.log(error) })
  }
}
</script>

<style lang="scss">
@import "../../../sass/variables";

.user {
  display: flex;
}

.user-profile {
  width: 360px;
  flex-grow: 0;
  background: #fff;
  box-shadow: 0 1px 4px rgba(0, 0, 0, .1);
  border-radius: 3px;
  position: relative;
}

.banner a {
  position: relative;
  display: block;
  height: 180px;
  width: 100%;
  background-size: cover;
  background: 50% #616161;
}

.avatar {
  position: absolute;
  display: inline;
  bottom: -50px;
  left: 21px;

  img {
    border: 2px solid #fff;
  }
}

/*.banner {
  height: $banner-height;
  overflow: hidden;
  text-align: center;

  img {
    width: 100%;
  }
}

.user-profile {
  position: absolute;
  display: flex;
  top: 28%;
  left: 20%;
  color: #fff;
}

.user-info {
  margin-left: 1.5rem;
}

.user-stats {
  dl {
    display: inline-block;
    text-align: center;
  }
}

.avatar {
  img {
    border: 2px solid #fff;
  }
}*/
</style>