<template>
  <div class="user">
    <div class="user-profile">
      <div class="banner">
        <router-link :to="{ name: 'user', params: { nickname } }" :style="bannerStyle" class="banner-link"></router-link>
        <router-link :to="{ name: 'user', params: { nickname } }" class="avatar-link">
          <img class="avatar-96 round-image" :src="avatar">
        </router-link>
      </div>
      <div class="user-data">
        <h1>
          <router-link :to="{ name: 'user', params: { nickname } }">{{ username }}</router-link>
        </h1>
        <div class="nickname">
          <router-link :to="{ name: 'user', params: { nickname } }">@{{ nickname }}</router-link>
        </div>

        <div class="user-actions">
          <button class="btn btn-main" v-if="canFollow">Читать</button>
          <button class="btn btn-done" v-if="following">Читаю</button>
        </div>

        <div class="description" v-if="description">
          <span>{{ description }}</span>
        </div>
      </div>
    </div>

    <div class="user-content">
      <div class="user-navigation">

        <div class="user-links">
          <a href="#">Ответы {{ replyCount }}</a>
          <a href="#">Вопросы {{ questionsCount }}</a>
          <a href="#">Нравится {{ likesCount }}</a>
        </div>

        <div class="user-sort">
          <a href="#">Популярные</a>
          <a href="#">Последние</a>
        </div>

      </div>
      <router-view></router-view>
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
      replyCount: 0,
      likesCount: 0,
      questionsCount: 0,
      followingCount: 0,
      followersCount: 0,
      nickname: this.$route.params.nickname,
      canFollow: false,
      following: false,
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
        this.followingCount = data.following_count;
        this.followersCount = data.followers_count;
        this.likesCount = data.likes_count;
        this.replyCount = data.reply_count;
        this.questionsCount = data.questions_count;
        this.canFollow = data.can_follow;
        this.following = data.following;
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
  border-radius: 2px;
  position: relative;
  box-shadow: 0 1px 3px rgba(0, 0, 0, .1);
  padding-bottom: 1rem;
}

.banner {
  position: relative;

  .banner-link {
    width: 100%;
    height: 180px;
    display: block;
    background-size: cover;
    background: 50% #616161;
  }
}

.avatar-link {
  position: absolute;
  display: inline;
  bottom: -50px;
  left: 21px;

  img {
    border: 2px solid #fff;
  }
}

.user-data {
  padding-top: 2.4rem;
  margin-left: 1.2rem;
  margin-right: 1.2rem;
  margin-top: 1rem;

  h1 {
    margin: 0;
    font-size: 1.5rem;

    a {
      color: #333;
    }
  }

  .nickname {
    margin-top: 0.6rem;
  }

  .user-actions {
    margin-top: 1.4rem;
  }

  .description {
    margin-top: 1rem;

    span {
      color: #424242;
      font-size: 1.1rem;
    }
  }
}

.user-content {
  flex-grow: 1;
  margin-left: 16px;
}

.user-navigation {
  padding: 1rem;
  background: #fff;
  box-shadow: 0 0 3px 0 rgba(0,0,0,.1);
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  border-radius: 0 0 3px 3px;
  font-size: 1.2rem;
}

.user-links a,
.user-sort a:first-child {
  margin-right: 1rem;
}

</style>