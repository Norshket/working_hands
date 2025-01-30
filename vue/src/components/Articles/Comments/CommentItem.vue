<template>
  <div class="card mb-2" v-for="comment in comments" :key="comment.id">
    <div class="card-header">{{ comment.title }}</div>
    <div class="card-body">{{ comment.message }}</div>
  </div>
</template>

<script>
export default {
  name: "CommentItem",

  props: {
    comments: {
      type: Array,
      default: () => []
    },
  }
}
</script>