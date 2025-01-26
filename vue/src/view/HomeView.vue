<template>
  <div class="row justify-content-around">
    <article-cart
        class="my-4"
        v-for="(item, index) in articles"
        :key="index.id"
        :article="item"
    />
  </div>

</template>

<script>

import ArticleCart from "@/components/Articles/Card.vue";

export default {
  name: "HomeView",

  components: {ArticleCart},

  data() {
    return {
      articles: []
    }
  },

  created() {
    this.getLastedArticle()
  },

  methods: {
    async getLastedArticle() {
      await this.$api.home.index().then(({data}) => {
        this.articles = data.data

      }).catch((errors) => {
        console.log(errors)
      })
    },
  }

}
</script>