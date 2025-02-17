<template>
  <div class="col-12 m-4 bg-body-secondary rounded p-4">
    <comment-form @add-comment="addComment"/>
    <hr>
    <comment-item :comments="comments"/>
    <comment-pagination
        :pagination="pagination"
        @show-more="showMore"

    />

  </div>
</template>

<script>

import CommentItem from "@/components/Articles/Comments/CommentItem.vue";
import CommentForm from "@/components/Articles/Comments/CommentForm.vue";
import CommentPagination from "@/components/Articles/Comments/CommentPagination.vue";
import toast from "@/widgets/toaster";

export default {
  name: "ArticleComments",
  components: {CommentItem, CommentForm, CommentPagination},

  props: {
    articleId: {
      type: String || Number,
      default: null
    },
  },

  data() {
    return {
      comments: [],
      pagination: {}
    }
  },

  created() {
    this.getComments()
  },

  methods: {
    async getComments() {
      await this.$api.articleComments.index(this.articleId)
          .then(({data}) => this.setComments(data))
    },

    setComments(data) {
      this.comments = this.comments.concat(data.comments)
      this.pagination = data.pagination
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
    },

    async showMore(limit, offset) {
      await this.$api.articleComments.index(this.articleId, {
        limit: limit,
        offset: offset,
      })
          .then(({data}) => this.setComments(data))
    },

  }


}
</script>

