<template>
  <header class="header">
    <router-link class="header-brand" to="/">WH</router-link>

    <button class="header-toggler" type="button">
      <span class="header-toggler-icon"></span>
    </button>

    <ul class="header-nav mr-auto">
      <li v-for="(item) in filterMenu" class="nav-item" :key="item.key">
        <router-link
            class="nav-link"
            :to="item.link"
            activeClass="text-primary"

        >{{ item.text }}
        </router-link>
      </li>

      <li class="nav-item">
        <button class="nav-link" v-if="isAuth" @click="logout">Logout</button>
      </li>

    </ul>
  </header>
</template>

<script>
import {mapActions, mapGetters} from "vuex";

export default {
  name: "AppNavbar",

  props: {
    menu: {
      type: Array,
      default: () => []
    }
  },
  computed: {
    ...mapGetters('auth', ['isAuth', "access", "can"]),

    filterMenu: function () {
      return this.menu.filter(menuItem => {
        return this.access(menuItem.accesses) && (this.can(...menuItem.visibility) || !menuItem.visibility.length)
      })
    }
  },

  methods: {
    ...mapActions('auth', ['logout']),
  }
}
</script>