<template>
  <div>
    <AppNavbar
        :menu="menu"
    />
    <slot/>
  </div>
</template>

<script>

import AppNavbar from "@/components/AppNavbar.vue";
import config from '@/configs'
export default {

  name: 'DefaultLayout',

  components: {
    AppNavbar
  },

  data() {
    return {
      menu: config.menu
    }
  }
}

</script>
