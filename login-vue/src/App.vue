<template>
  <nav v-if="$store.state.user">
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> |
    <a @click="$store.dispatch('logout')" href="">Logout</a>
  </nav>
  <nav v-else>
      <router-link to="/login">Login</router-link>
  </nav>
  <router-view></router-view>
</template>

<style lang="scss">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

nav {
    padding: 30px;

    a {
        font-weight: bold;
        color: #2c3e50;

        &.router-link-exact-active {
        color: #42b983;
        }
    }
}
</style>

<script>
import { onBeforeMount } from 'vue'
import { useStore } from "vuex"

export default {
    setup() {
        const store = useStore()

        onBeforeMount(() => {
            store.dispatch('fetchUser')
        })

        // return {
        //     user: store.state.user
        // }
    }
}
</script>
