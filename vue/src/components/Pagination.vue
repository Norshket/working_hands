<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">

      <li class="page-item">
        <button
            class="page-link"
            @click="goToPage(pagination.currentPage - 1)"
            aria-label="Previous"
        >
          <span aria-hidden="true">&laquo;</span>
        </button>
      </li>

      <li
          class="page-item"
          v-for="item in pages"
          :key="item"
          @click="goToPage(item)"
      >
        <button class="page-link">{{ item }}</button>
      </li>

      <li class="page-item">
        <button
            class="page-link"
            type="button"
            @click="goToPage(pagination.currentPage + 1)"
            aria-label="Next"
        >
          <span aria-hidden="true">&raquo;</span>
        </button>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "AppPagination",

  props: {
    pagination: {
      type: Object,
      required: true,
    }
  },

  computed: {
    pages() {
      const pages = [];
      for (let i = 1; i <= this.pagination.lastPage; i++) {
        pages.push(i)
      }
      return pages
    }
  },

  methods: {
    goToPage(pageNumber) {
      if (pageNumber <= this.pagination.lastPage && pageNumber > 0) {
        this.$emit('goToPage', this.pagination.limit, this.pagination.limit * (pageNumber - 1))
      }
    }
  }
}
</script>
