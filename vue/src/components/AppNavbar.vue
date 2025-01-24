<template>
  <header class="header">
    <router-link class="header-brand" to="/">WH</router-link>

    <button class="header-toggler" type="button">
      <span class="header-toggler-icon"></span>
    </button>

    <ul class="header-nav mr-auto">
      <li v-for="(item, index) in menuItems" class="nav-item" :key="index">
        <router-link class="nav-link" :to="item.routeName">{{ item.title }}</router-link>
      </li>
    </ul>
  </header>
</template>

<script>
export default {
  name: "AppNavbar",
  data() {
    return {
      menuItems: [
        {
          title: 'Home',
          routeName: '/'
        },
        {
          title: 'Articles',
          routeName: '/articles'
        },
        {
          title: 'Login',
          routeName: '/login'
        },
        {
          title: 'Register',
          routeName: '/register'
        }
      ]
    }
  }
}
</script>