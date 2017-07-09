<template>
    <nav class="navbar navbar-toggleable-md header">
        <div class="container">
            <a class="navbar-brand brand-link" href="/">Queryme</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/discover">Discover</a>
                    </li>
                </ul>
                <div class="my-2 my-md-0">
                    <span class="login" v-if="canShowLogin()" v-on:click="showLoginWindow">Вход</span>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
      methods: {
        canShowLogin() {
          return Queryme.Auth == undefined;
        },
        showLoginWindow() {
          this.$modal.show('login');
        }
      }
    }
</script>