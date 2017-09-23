<template>
  <div>
    <div class="banner">
      <img :src="banner">
    </div>

    <div class="user-profile">
      <div class="avatar">
        <img class="round-image avatar-150" :src="avatar">
      </div>

      <div class="user-info">
        <div>{{ username }}</div>
        <div>@{{ nickname }}</div>
        <div>{{ description }}</div>
        <div class="user-stats">
          <dl>
            <a href="#">
              <dt>{{ following_count }}</dt>
              <dd>
                <span>Читаемые</span>
              </dd>
            </a>
          </dl>

          <dl>
            <a href="#">
              <dt>{{ followers_count }}</dt>
              <dd>
                <span>Читатели</span>
              </dd>
            </a>
          </dl>
        </div>
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
      banner: '',
      username: '',
      description: '',
      following_count: 0,
      followers_count: 0,
      nickname: this.$route.params.nickname,
      }
    },
  mounted() {
    user.getInfo(this.$route.params.nickname)
      .then(response => {
        const data = response.data;
        this.avatar = data.avatar;
        this.banner = data.banner;
        this.username = data.username;
        this.description = data.description;
        this.following_count = data.following_count;
        this.followers_count = data.followers_count;
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
}
</style>