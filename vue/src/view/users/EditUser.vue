<template>
  <div class="card">
    <div class="card-header">
      <h2>Редактирование</h2>
    </div>
    <div class="card-body">
      <form class="row" @submit.prevent="update">
        <div class="col-12">

          <div class="input-group mb-3">
            <input
                class="form-control"
                v-model="form.name"
                type="text"
                placeholder="Name"
            />
          </div>
          <div class="input-group mb-3">
            <input
                class="form-control"
                v-model="form.email"
                type="email"
                placeholder="Email"
            />
          </div>

          <div class="input-group mb-3">
            <input
                class="form-control"
                v-model="form.password"
                type="password"
                placeholder="Password"
            />
          </div>

          <multiselect
              class="mb-2"
              v-model="form.roles"
              :options="roles"
              :close-on-select="false"
              :multiple="true"
              track-by="display_name"
              label="display_name"
          />

          <multiselect
              class="mb-2"
              v-model="form.permissions"
              :options="permissions"
              :close-on-select="false"
              :multiple="true"
              track-by="display_name"
              label="display_name"
          />
        </div>

        <div class="row">
          <div class="col-6">
            <button class="btn btn-primary px-4" type="submit">Отправить</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<script>

import Multiselect from 'vue-multiselect'
import {$api} from "@/api";
import router from "@/router/router";
import toast from "@/widgets/toaster";


export default {
  name: "CreateArticle",
  components: {Multiselect},
  data() {
    return {
      form: {
        name: null,
        email: null,
        password: null,
        roles: [],
        permissions: null
      },

      roles: [],
      permissions: []
    }
  },

  created() {
    this.getData()
  },

  methods: {
    async getData() {
      await $api.users.getEditData(this.$route.params.id)
          .then(({data}) => this.setData(data))
    },

    setData(data) {
      this.setForm(data.user)
      this.roles = data.roles
      this.permissions = data.permissions
    },

    setForm(user) {
      this.form.name = user.name
      this.form.email = user.email
      this.form.password = null
      this.form.roles = user.roles
      this.form.permissions = user.permissions
    },

    async update() {

      let requset = structuredClone(this.form)

      requset.roles = requset.roles.map((role) => role.id)
      requset.permissions = requset.permissions.map((permission) => permission.id)

      await $api.users.update(this.$route.params.id, requset)
          .then(() => this.success())
          .catch((error) => this.error(error))
    },

    success() {
      router.push('/users')
    },

    error(error) {
      if (error.status === 422) {
        toast.error(error.response.data.message)
      }
    },
  }
}
</script>

