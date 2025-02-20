<template>

  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img
            :src="article.imageUrl"
            class="card-img-top"
            alt="photo">

      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ article.title }}</h5>
          <p class="card-text">{{ article.content }}</p>
        </div>
      </div>

      <div class="card-footer bg-transparent border-success">
        <router-link
            class="btn btn-outline-primary m-1"
            :to="{ name: 'articles.show', params:{id: article.id}}"
        >
          Посмотреть
        </router-link>

        <router-link
            v-if="canUpdate"
            class="btn btn-outline-success m-1"
            :to="{ name: 'me.articles.edit', params:{id: article.id}}"
        >
          Редактировать
        </router-link>


        <button
            v-if="canDelete"

            class="btn btn-outline-danger m-1"
            type="button"
            @click="removeItem(article.id)"
        >
          Delete
        </button>
      </div>
    </div>
  </div>


</template>


<script>
import {mapGetters} from "vuex";

export default {
  name: "ArticleCard",
  props: {
    article: {
      type: Object,
      default: () => {
      }
    }
  },

  computed: {
    ...mapGetters('auth', ['can', 'isAdmin', 'isModerator', 'user']),

    canDelete() {
      return (this.can('articles_delete') && this.article.user_id === this.user.id)
          || this.isModerator
          || this.isAdmin
    },

    canUpdate(){
      return (this.can('articles_update') && this.article.user_id === this.user.id)
          || this.isModerator
          || this.isAdmin

    }
  },

  methods: {
    removeItem(articleId) {
      this.$emit('removeItem', articleId)
    }
  }
}
</script>


