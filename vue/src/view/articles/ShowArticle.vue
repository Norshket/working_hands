<template>

  <div class="row justify-content-around">

    <div class="col-lg-3 col-sm-12 bg-body-secondary rounded ">

      тут будут теги

    </div>

    <div class="card col-lg-8 col-sm-12">
      <div class="card-header">
        <h2>{{ article.title }}</h2>

      </div>
      <div class="card-body">
        <p>{{ article.content }}</p>
      </div>
      <div class="card-footer row">
        <p class="col-1">
          like : {{article.likes}}
        </p>
        <p class="col-1">
          views: {{article.views}}
        </p>

      </div>
    </div>
  </div>


</template>


<script>
export default {
  name: "ShowArticle",

  data() {
    return {
      article: {}

    }
  },

  created() {
    this.getArticle()
  },

  methods: {
    getArticle() {
      this.$api.articles.show(this.$route.params.id)
          .then(({data}) => {
            this.article = data.data
          })
          .catch((errors) => {
            console.log(errors)
          })
    }
  }
}


</script>
