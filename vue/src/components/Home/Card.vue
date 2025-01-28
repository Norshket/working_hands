<template>
  <div class="card" style="width: 18rem;">
    <img src="/" class="card-img-top" alt="photo">

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
  name: "HomeCard",
  props: {
    article: {
      type: Object,
      default: () => {
      }
    }
  }
}
</script>


