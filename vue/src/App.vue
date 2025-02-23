<template>
  <component :is="currentLayout" v-if="isRouterLoaded">
    <router-view/>
  </component>
</template>

<script>
import DefaultLayout from "@/layouts/DefaultLayout.vue";
import AuthLayout from "@/layouts/AuthLayout.vue";

import centrifuge from "@/widgets/centrifuge"

export default {
  name: 'App',
  components: {
    DefaultLayout,
    AuthLayout,
  },

  data() {
    return {
      centrifuge: null
    }
  },

  computed: {
    isRouterLoaded: function () {
      return this.$route.name !== null
    },

    currentLayout: function () {
      return this.$route.matched.slice().reverse().find(route => route.meta.layout)?.meta.layout || 'DefaultLayout'
    }
  },

  created() {
    centrifuge.newSubscription('news')
        .on('publication', function (ctx) {
          console.log(ctx.data);
        })
        .subscribe();
  }
}
</script>
