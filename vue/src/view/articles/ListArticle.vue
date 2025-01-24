<template>
  <div>
    ListArticle asd
  </div>
  <div>

    asdasd
  </div>

</template>


<script>
import {mapActions} from "vuex";

export default {
  name: "ListArticle",

  created() {
    this.getListArticles();
  },

  methods:{
    ...mapActions('articles',['getListArticles'])
  }


}
</script>
