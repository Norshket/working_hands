<template>
  <div class="row  justify-content-between">
    <div class="col-12 mb-4">
      <router-link
          v-if="can('articles_create')"
          class="btn btn-primary"
          :to="{name:'me.articles.create'}"
      >
        Create articles
      </router-link>
    </div>

    <div class=" col-12">
      <article-cart
          class="mb-3"
          v-for="(item, index) in articles"
          :key="index.id"
          :article="item"
          @remove-item="removeItem"
      />

      <app-pagination
          :pagination="pagination"
          @go-to-page="goToPage"
      />
    </div>
  </div>
</template>


<script>
import ArticleCart from "@/components/Articles/Card.vue"
import AppPagination from "@/components/Pagination.vue";
import {mapGetters} from "vuex";
import {$api} from "@/api";

export default {
  name: "ListArticle",
  components: {ArticleCart, AppPagination},

  data() {
    return {
      articles: [],
      pagination: {}
    }
  },

  created() {
    this.getDataList()
  },


  computed: {
    ...mapGetters('auth', ['user', 'access', 'can'])
  },

  methods: {
    async getDataList(params = null) {
      params = Object.assign({user_id: this.user.id}, params)
      await $api.articles.index(params)
          .then(({data}) => this.setArticleData(data))
          .catch((errors) => console.log(errors))
    },

    removeItem(articleId) {
      $api.articles.delete(articleId)
          .then(() => this.getDataList())
          .catch((errors) => console.log(errors))
    },

    setArticleData(data) {
      this.articles = data.articles
      this.pagination = data.pagination
    },

    goToPage(numberPage, offset) {
      this.getDataList({
        limit: numberPage,
        offset: offset,
      })
    }
  }
}
</script>
