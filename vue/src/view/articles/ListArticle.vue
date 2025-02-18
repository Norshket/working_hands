<template>
  <div class="row justify-content-between">

    <div class="col-sm-12 col-md-4 ">
        <app-tags
            class="sticky-top"
            v-model="params.tags"
            :option="tags"
        />
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
import AppTags from "@/components/AppTags.vue";
import {$api} from "@/api";

export default {
  name: "ListArticle",
  components: {ArticleCart, AppPagination, AppTags},

  data() {
    return {
      articles: [],
      tags: [],
      pagination: {},
      params: {
        tags: [],
        limit: 6,
        offset: 0
      }
    }
  },

  watch: {
    params: {
      async handler() {
        await this.getDataList()
      },
      deep: true
    },
  },

  created() {
    this.getDataList()
    this.getTags()
  },

  methods: {
    async getDataList() {
      await $api.articles.index(this.params)
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

    goToPage(limit, offset) {
      this.params.limit = limit
      this.params.offset = offset
      this.getDataList()
    },
  }
}
</script>
