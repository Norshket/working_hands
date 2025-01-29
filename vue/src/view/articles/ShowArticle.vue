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
        :comments="comments"
        :pagination="commentPagination"
        @add-comment="addComment"
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
      comments: [],
      commentPagination: {}
    }
  },

  created() {
    this.getArticle()
    this.getComments()
  },

  methods: {
    async getArticle() {
      await this.$api.articles.show(this.$route.params.id).then(({data}) => {
        this.article = data.data
      })
          .catch((errors) => {
            console.log(errors)
          })
    },

    async getComments() {
      await this.$api.articleComments.index(this.$route.params.id).then(({data}) => {
        const [comments, pagination] = data
        this.comments = comments
        this.commentPagination = pagination
      })
          .catch((errors) => {
            console.log(errors)
          })
    },

    async addComment(form) {
      await this.$api.articleComments.create(this.$route.params.id, form).then(({data}) => {
        console.log(data)
      })
          .catch((errors) => {
            console.log(errors)
          })
    }
  }
}


</script>
