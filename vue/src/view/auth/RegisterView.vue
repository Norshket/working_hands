<template>
  <form @submit.prevent="registerMethod" class="col-md-6">
    <div class="card mb-4 mx-4">
      <div class="card-body p-4">
        <h1>Register</h1>
        <p class="text-body-secondary">Create your account</p>

        <div class="input-group mb-3">
          <input class="form-control" v-model="form.name" type="text" placeholder="Name" required/>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" v-model="form.email" type="email" placeholder="Email" required/>
        </div>
        <div class="input-group mb-3">
          <input class="form-control" v-model="form.password" type="password" placeholder="Password" required/>
        </div>

        <button class="btn btn-block btn-success" type="submit">Create Account</button>
      </div>
    </div>
  </form>
</template>

<script>
import {mapActions} from "vuex";

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

    ...mapActions('auth', ['register']),

    async registerMethod() {
      await this.register(this.form)
    }
  }
}
</script>

