<template>
  <div class="col-12 m-4 bg-body-secondary rounded p-4">
    <comment-form @add-comment="addComment"/>
    <hr>
    <comment-item :comments="comments"/>
  </div>
</template>

<script>

import CommentItem from "@/components/Articles/Comments/CommentItem.vue";
import CommentForm from "@/components/Articles/Comments/CommentForm.vue";

export default {
  name: "ArticleComments",
  components: {CommentItem, CommentForm},

  props: {
    comments: {
      type: Array,
      default: () => []
    },
    pagination: {
      type: Object,
      default: () => {
      }
    }
  },

  data() {
    return {
      form: {
        title: null,
        message: null
      }
    }
  },

  methods: {
    async addComment() {
      this.$emit('addComment', this.form)
      this.form.title = null
      this.form.message = null
    }
  }


}
</script>

