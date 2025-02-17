<template>

  <div class="row justify-content-around">

    <div class="card col-12">
      <div class="card-header">
        <h2>{{ article.title }}</h2>
      </div>
      <div class="card-body">
        <p>{{ article.content }}</p>
      </div>
      <div class="card-footer row justify-content-between">
        <p class="col-1">
          views: {{ article.views }}
        </p>
        <p class="col-1">
          like : {{ article.likes }}
        </p>
      </div>
    </div>

    <article-comments
        :articleId="$route.params.id"
    />
  </div>
</template>

<script>
import ArticleComments from "@/components/Articles/Comments/Comments.vue"

export default {
  name: "ShowArticle",

  components: {ArticleComments},

  data() {
    return {
      article: {},
    }
  },

  created() {
    this.getArticle()
  },

  methods: {
    async getArticle() {
      await this.$api.articles.show(this.$route.params.id)
          .then(({data}) => this.setArticle(data))
    },

    setArticle(data) {
      this.article = data.data
    },
  }
}


</script>
