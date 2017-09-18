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
                    <a href="#" class="logout" v-if="!canShowLogin()" v-on:click="logout">Выход</a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
      methods: {
        canShowLogin() {
            return true;
        },
        showLoginWindow() {
          this.$modal.show('login');
        },
        logout(e) {
          e.preventDefault();
          axios.post('/auth/logout', {
            headers: {}
          }).then(function (response) {
              window.location.replace('/');
          })
        }
      }
    }
</script>

<style lang="scss">
    @import "../../sass/variables";
    .header {
        .nav-link {
            color: $nav-item-color;
            line-height: 3rem;

            &:hover {
                color: $brand-primary;
            }
        }
    }

    .logout {
        color: $brand-primary;
        line-height: 3.9rem;

        &:hover {
            color: $brand-primary-hover;
        }
    }

    .brand-link {
        &:hover {
            color: $brand-primary;
        }
    }

    .login {
        color: $brand-primary;
        cursor: pointer;
        line-height: 4rem;
        vertical-align: middle;

        &:hover {
            color: $brand-primary-hover;
        }
    }
</style>