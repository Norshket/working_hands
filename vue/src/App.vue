<template>
  <AppNavbar/>
  <main>
    <RouterView/>
  </main>
</template>

<script>
import AppNavbar from "./components/AppNavbar.vue";

export default {
  components: {AppNavbar},
  name: 'App',
}
</script>
