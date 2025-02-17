<template>
  <div class="card">
    <div class="card-header">
      <h2>Редактирование</h2>
    </div>
    <div class="card-body">
      <form class="row" @submit.prevent="update">
        <div class="col-4">
          <form-image
              v-model="form.imageUrl"
              @set-file="setFile"
          />

        </div>
        <div class="col-8">
          <div class="input-group mb-3">
            <input
                class="form-control"
                v-model="form.title"
                type="text"
                placeholder="Заголовок"
            />
          </div>

          <div class="input-group mb-4">
            <textarea
                v-model="form.content"
                placeholder="Статья"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="15">
            </textarea>
          </div>

          <multiselect
              class="mb-2"
              v-model="form.tags"
              :options="tags"
              :close-on-select="false"
              :multiple="true"
              track-by="title"
              label="title"
          />
        </div>

        <div class="row">
          <div class="col-6">
            <button class="btn btn-primary px-4" type="submit">Отправить</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<script>

import Multiselect from 'vue-multiselect'
import FormImage from "@/components/Widgets/Form/FormImage.vue";
import {$api} from "@/api";
import router from "@/router/router";
import toast from "@/widgets/toaster";


export default {
  name: "CreateArticle",
  components: {Multiselect, FormImage},
  data() {
    return {
      form: {
        title: null,
        content: null,
        tags: [],
        image: null,
        imageUrl: null
      },
      tags: []
    }
  },

  created() {
    this.getData()
  },

  methods: {
    async getData() {
      await $api.articles.getEditData(this.$route.params.id)
          .then(({data}) => this.setData(data))
    },

    setData(data) {
      this.setForm(data.article)
      this.tags = data.tags
    },

    setForm(article) {
      this.form.title = article.title
      this.form.content = article.content
      this.form.tags = article.tags
      this.form.imageUrl = article.imageUrl
    },

    async update() {
      let requset = structuredClone(this.form)
      requset.tags = requset.tags.map((tag) => tag.id)
      await $api.articles.update(this.$route.params.id, requset)
          .then(() => this.success())
          .catch((error) => this.error(error))
    },

    success() {
      router.push('/me/articles')
    },

    error(error) {
      if (error.status === 422) {
        toast.error(error.response.data.message)
      }
    },

    setFile(image) {
      this.form.image = image
    },
  }
}
</script>

