<template>
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card-group d-block d-md-flex row">
        <form class="card col-md-7 p-4 mb-0" @submit.prevent="loginMethod">
          <div class="card-body">
            <h1>Login</h1>
            <p class="text-body-secondary">Sign In to your account</p>
            <div class="input-group mb-3">
              <input
                  class="form-control"
                  v-model="form.email"
                  type="email"
                  placeholder="Email"
                  required
              />
            </div>
            <div class="input-group mb-4">
              <input
                  class="form-control"
                  v-model="form.password"
                  type="password"
                  placeholder="Password"
                  required
              />
            </div>
            <div class="row">
              <div class="col-6">
                <button class="btn btn-primary px-4" type="submit">Login</button>
              </div>
            </div>
          </div>
        </form>
        <div class="card col-md-5 text-white bg-primary py-5">
          <div class="card-body text-center">
            <div>
              <h2>Sign up</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
              <router-link class="btn btn-lg btn-outline-light mt-3" :to="{name:'register'}">Register Now!</router-link>
              <router-link class="btn btn-secondary btn-outline-light mt-3" :to="{name:'home'}">Main page</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>

import {mapActions} from "vuex";

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
    ...mapActions('auth', ['login']),

    async loginMethod() {
      await this.login(this.form)
    }
  }
}


</script>