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
import toast from "@/widgets/toaster";

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
      await this.$api.articles.show(this.$route.params.id)
          .then(({data}) => this.setArticle(data))
    },

    setArticle(data) {
      this.article = data.data
    },

    async getComments() {
      await this.$api.articleComments.index(this.$route.params.id)
          .then(({data}) => this.setComments(data))
    },

    setComments(data) {
      this.comments = data.comments
      this.commentPagination = data.pagination
    },

    async addComment(form) {
      await this.$api.articleComments.create(this.$route.params.id, form)
          .then(() => this.success())
          .catch((error) => this.error(error))
    },

    success() {
      toast.success('Комментарий добавлен и ждёт обработки ')
    },
    error(error) {
      if (error.status === 422) {
        toast.error(error.response.data.message)
      }
    }
  }
}


</script>
