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

  mounted() {
    this.getFilterMenu(this.menu)
  },

  computed: {
    ...mapGetters('auth', ['isAuth', "access"]),

    filterMenu: function () {
      return this.getFilterMenu(this.menu)
    }
  },

  methods: {
    ...mapActions('auth', ['logout']),

    getFilterMenu(menu) {
      const filtered = []

      menu.forEach(menuItem => {
        if (this.access(menuItem.accesses)) {
          filtered.push(menuItem)
        }
      })
      return filtered
    }
  }
}
</script>