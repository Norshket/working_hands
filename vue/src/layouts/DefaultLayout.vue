<template>
  <div>
    <AppNavbar
        :menu="menu"
    />
      <div class="container-fluid ">
        <div class="row justify-content-center px-3 pt-3">
          <slot/>
        </div>
    </div>
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
