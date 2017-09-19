<template>
  <modal name="login" :width="320" :height="162">
    <div class="login_buttons_wrapper">
      <div class="login_buttons">
        <div class="login_button fb_large_login">
          <span class="fb_icon"></span>
          <a class="login_right_side" href="/auth/facebook">Вход с помощью Facebook</a>
        </div>

        <div class="login_button vk_large_login">
          <span class="vk_icon"></span>
          <a class="login_right_side" href="/auth/vkontakte">Вход с помощью Vkontakte</a>
        </div>
      </div>
    </div>
  </modal>
</template>

<style lang="scss">
.v--modal {
  left: 0 !important;
  margin: auto;
}

.login_buttons {
    max-width: 250px;
    margin: 0 auto;
}

.fb_large_login {
    background-color: #4267B2;
}

.vk_large_login {
    background-color: #507299;
}

.login_button {
    margin: 25px 0;
    width: 100%;
    height: 43px;
    border-radius: 3px;
    outline: 0;
    border: 0;
    padding: 0;
    cursor: pointer;
    text-align: center;
}

.fb_icon, .vk_icon {
    float: left;
    width: 42px;
    height: 42px;
    border-right: 1px solid #3a65ab;
    background-position: center;
    background-repeat: no-repeat;
}

.fb_icon {
    background-image: url(/images/fb_login_icon.png);
}

.vk_icon {
    background-image: url(/images/vk_login_icon.svg);
}

.login_right_side {
    color: white;
    width: 198px;
    height: 43px;
    line-height: 43px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}
</style>