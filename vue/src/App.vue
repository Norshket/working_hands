<template>
  <component :is="currentLayout" v-if="isRouterLoaded">
    <router-view/>
  </component>
</template>

<script>
import DefaultLayout from "@/layouts/DefaultLayout.vue";
import AuthLayout from "@/layouts/AuthLayout.vue";

export default {
  name: 'App',
  components: {
    DefaultLayout,
    AuthLayout,
  },

  computed: {
    isRouterLoaded: function () {
      return this.$route.name !== null
    },

    currentLayout: function () {
      return this.$route.matched.slice().reverse().find(route => route.meta.layout)?.meta.layout || 'DefaultLayout'
    }
  },

}
</script>
