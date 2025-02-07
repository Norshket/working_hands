<template>
  <div class="card">
    <img
        :src="article.imageUrl"
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

      <router-link
          class="btn btn-primary"
          :to="{ name: 'me.articles.edit', params:{id: article.id}}"
      >
        Редактировать
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


