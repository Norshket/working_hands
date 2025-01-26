<template>
  <div class="row justify-content-around">

    <article-cart
        class="my-4"
        v-for="(item, index) in getList"
        :key="index.id"
        :article="item"
    />



  </div>

</template>


<script>
import {mapActions, mapGetters} from "vuex";
import ArticleCart from "@/components/Articles/Card.vue"

export default {
  name: "ListArticle",
  components: {ArticleCart},

  created() {
    this.getListArticles();
  },

  computed: {
    ...mapGetters('articles', ['getList'])

  },

  methods: {
    ...mapActions('articles', ['getListArticles'])
  }


}
</script>
