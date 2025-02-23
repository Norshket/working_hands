<template>
  <div class="row  justify-content-between">
    <div class="col-12 mb-4">
      <router-link
          v-if="can('users_create')"
          class="btn  btn-outline-primary"
          :to="{name:'users.create'}"
      >
        Create users
      </router-link>
    </div>

    <div class="col-12">
      <table class="table table-bordered">
        <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Email</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for=" user  in users " :key="user.id">
          <th scope="row">{{ user.id }}</th>
          <td>{{ user.email }}</td>
          <td>{{ user.name }}</td>
          <td>

            <router-link
                v-if="can('users_update')"
                class="btn btn-outline-success"
                :to="{name:'users.edit', params:{id:user.id}}"
            >
              Update
            </router-link>

            <button
                class="btn btn-outline-danger m-1"
                type="button"
                @click="removeItem(user.id)"
            >
              Delete
            </button>          </td>
        </tr>
        </tbody>
      </table>

      <app-pagination
          :pagination="pagination"
          @go-to-page="goToPage"
      />
    </div>
  </div>
</template>


<script>
import AppPagination from "@/components/Pagination.vue";
import {mapGetters} from "vuex";
import {$api} from "@/api";

export default {
  name: "ListUser",
  components: {AppPagination},

  data() {
    return {
      users: [],
      pagination: {},
      params: {
        limit: 6,
        offset: 0
      }
    }

  },

  created() {
    this.getDataList()
  },

  computed: {
    ...mapGetters('auth', ['user', 'access', 'can'])
  },

  methods: {
    async getDataList() {
      await $api.users.index(this.params)
          .then(({data}) => this.setArticleData(data))
          .catch((errors) => console.log(errors))
    },

    removeItem(articleId) {
      $api.users.delete(articleId)
          .then(() => this.getDataList())
          .catch((errors) => console.log(errors))
    },

    setArticleData(data) {
      this.users = data.users
      this.pagination = data.pagination
    },

    goToPage(limit, offset) {
      this.params.offset = offset
      this.params.limit = limit
      this.getDataList()
    }
  }
}
</script>
