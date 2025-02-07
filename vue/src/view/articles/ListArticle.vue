<template>


  <div class="row  justify-content-between">

    <div class="col-sm-12 col-md-4 ">
      <div class="sticky-top card ">
        <div class="card-header">
          <h2>Tags</h2>
        </div>
        <div class="card-body">
          <button
              v-for="tag in tags"
              :key="tag.id"
              class="btn badge text-bg-primary m-1"
          >
            {{ tag.title }}
          </button>
        </div>
      </div>
    </div>

    <div class=" col-sm-12 col-md-8">
      <article-cart
          class="mb-3"
          v-for="(item, index) in articles"
          :key="index.id"
          :article="item"
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
import {$api} from "@/api";

export default {
  name: "ListArticle",
  components: {ArticleCart, AppPagination},

  data() {
    return {
      articles: [],
      tags: [],
      pagination: {}
    }
  },

  created() {
    this.getDataList()
    this.getTags()
  },

  methods: {
    async getDataList(params = null) {
      await $api.articles.index(params)
          .then(({data}) => this.setArticleData(data))
          .catch((errors) => console.log(errors))
    },

    setArticleData(data) {
      this.articles = data.articles
      this.pagination = data.pagination
    },

    async getTags() {
      await $api.tags.index()
          .then(({data}) => this.setTag(data))
          .catch((errors) => console.log(errors))
    },

    setTag(response) {
      this.tags = response.data
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
