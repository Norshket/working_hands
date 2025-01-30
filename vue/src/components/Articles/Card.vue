<template>
  <div class="card">
    <img
        src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/1f157a82172987.5d3544c355668.jpg"
        class="card-img-top"
        alt="photo">


    <div class="card-body">
      <h5 class="card-title">{{ article.title }}</h5>
      <p class="card-text">{{ article.content }}</p>

      <router-link
          class="btn btn-primary"
          :to="{ name: 'articles.show', params:{id: article.id}}"
      >
        Посмотреть
      </router-link>

    </div>
  </div>

</template>


<script>
export default {
  name: "ArticleCard",
  props: {
    article: {
      type: Object,
      default: () => {
      }
    }
  }
}
</script>


