<template>


  <div class="row  justify-content-between">

    <div class="col-sm-12 col-md-4 ">
      <div class="sticky-top card ">
        <div class="card-header">
          Tags
        </div>
        <div class="card-body">
          <button v-for="tag in tags" :key="tag.id" class="btn badge text-bg-primary m-1">
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
    this.getList()
  },

  methods: {
    async getList(params = null) {
      await $api.articles.index(params).then(({data}) => {

        this.articles = data.articles
        this.pagination = data.pagination
        this.tags = data.tags

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
