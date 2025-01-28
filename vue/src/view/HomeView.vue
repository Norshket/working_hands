<template>
  <div class="row justify-content-around">
    <home-card
        class="my-4"
        v-for="(item, index) in articles"
        :key="index.id"
        :article="item"
    />
  </div>

</template>

<script>

import HomeCard from "@/components/Home/Card.vue";

export default {
  name: "HomeView",

  components: {HomeCard},

  data() {
    return {
      articles: []
    }
  },

  created() {
    this.getLastedArticle()
  },

  methods: {
    async getLastedArticle() {
      await this.$api.home.index().then(({data}) => {
        this.articles = data.data

      }).catch((errors) => {
        console.log(errors)
      })
    },
  }

}
</script>