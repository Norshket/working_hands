<template>
  <div class="card" style="width: 18rem;">
    <img src="/" class="card-img-top" alt="photo">

    <div class="card-body">
      <h5 class="card-title">{{article.title}}</h5>
      <p class="card-text">{{article.content}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>

</template>


<script>
export default {
  name: "ArticleCard",
  props: {
    article: {
      type: Object,
      default: () => {}
    }
  }
}
</script>


