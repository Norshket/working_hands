<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="register">
      <input v-model="form.name" type="text" placeholder="Name" required/>
      <input v-model="form.email" type="email" placeholder="Email" required/>
      <input v-model="form.password" type="password" placeholder="Password" required/>
      <button type="submit">Register</button>
    </form>
  </div>
</template>

<script>
import apiClient from "@/api";

export default {
  name: "RegisterView",

  data() {
    return {
      form: {
        name: '',
        email: '',
        password: '',
      }
    }
  },

  methods: {
    async register() {
      await apiClient.post('/register', this.form).then((data) => {
        localStorage.setItem('auth_token', data.access_token);
        this.$router.push('/articles');
      }).catch((errors) => {
        console.log(errors)
      })
    }
  }
}
</script>

