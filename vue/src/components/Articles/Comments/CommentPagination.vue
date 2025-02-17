<template>

  <div
      class="row justify-content-center"
      v-if="pagination.lastPage > pagination.currentPage"
  >
    <button
        class="btn btn-outline-success col-4"
        @click="showMore(pagination.currentPage + 1)"
        aria-label="Previous"
    >
      Показать больше
    </button>
  </div>
</template>

<script>
export default {
  name: "CommentPagination",

  props: {
    pagination: {
      type: Object,
      required: true,
    }
  },

  methods: {
    showMore(pageNumber) {
      if (pageNumber <= this.pagination.lastPage && pageNumber > 0) {
        this.$emit('showMore', this.pagination.limit, this.pagination.limit * (pageNumber - 1))
      }
    }
  }
}
</script>
