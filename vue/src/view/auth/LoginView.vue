<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <input v-model="form.email" type="email" placeholder="Email" required/>
      <input v-model="form.password" type="password" placeholder="Password" required/>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>

import apiClient from "@/api";

export default {
  name: "LoginView",

  data() {
    return {
      form: {
        email: '',
        password: '',
      }
    }
  },

  methods: {
    async login() {
      await apiClient.post('/login', this.form)
          .then(({data}) => {
            localStorage.setItem('auth_token', data.access_token);
            this.$router.push('/articles');
          })
          .catch(error => {
            console.log(error)
          })
    }
  }
}


</script>