<template>
  <div class="card">
    <div class="card-header">
      <h2>Создать статью</h2>
    </div>
    <div class="card-body">
      <form class="row" @submit.prevent="createArticle">

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


export default {
  name: "CreateArticle",
  components: {Multiselect, FormImage},
  data() {
    return {
      form: {
        title: null,
        content: null,
        tags: null,
        image: null
      },

      tags: []
    }
  },

  created() {
    this.getData()
  },

  methods: {
    async createArticle() {

      const formData = new FormData();
      formData.append('image', this.form.image)
      formData.append('title', this.form.title)
      this.form.tags.forEach((tag) => {
        formData.append('tags[]', tag.id);
      });

      formData.append('content', this.form.content)

      await $api.articles.create(formData)
          .then(({data}) => console.log(data))
          .catch(({error}) => console.log(error))
    },

    async getData() {
      await $api.articles.getCreateData().then(({data}) => {
        this.tags = data.tags
      }).catch(({error}) => {
        console.log(error)
      })
    },

    setFile(image) {
      this.form.image = image
    },
  }
}
</script>

