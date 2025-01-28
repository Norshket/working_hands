<template>
  <div class="row justify-content-around">

    <article-cart
        class="my-4"
        v-for="(item, index) in articles"
        :key="index.id"
        :article="item"
    />

    <app-pagination
        :pagination="pagination"
        @go-to-page="goToPage"
    />


  </div>
</template>


<script>
import ArticleCart from "@/components/Articles/Card.vue"
import AppPagination from "@/components/Pagination.vue";
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
    this.getList()
  },

  methods: {
    async getList(params = null) {
      await $api.articles.index(params).then(({data}) => {
        const [articles, pagination] = data
        this.articles = articles
        this.pagination = pagination
      }).catch((errors) => {
        console.log(errors)
      })
    },

    goToPage(numberPage, offset) {
      this.getList({
        limit: numberPage,
        offset: offset,
      })
    }
  }
}
</script>
