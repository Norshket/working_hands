<template>
  <div class="col-12 m-4 bg-body-secondary rounded p-4">

    <div class="card">
      <div class="card-header">Добавить комменарий</div>
      <div class="card-body">
        <form @submit.prevent="addComment">
          <div class="input-group mb-3">
            <input
                class="form-control"
                v-model="form.title"
                type="text"
                placeholder="Тема"
                required
            />
          </div>

          <div class="input-group mb-4">
            <textarea
                v-model="form.message"
                placeholder="Сообщение"
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3">
            </textarea>
          </div>

          <div class="row">
            <div class="col-6">
              <button class="btn btn-primary px-4" type="submit">Отправить</button>
            </div>
          </div>

        </form>

      </div>

    </div>

    <hr>

    <comment-item
        :comments="comments"
    />
  </div>




</template>

<script>

import CommentItem from "@/components/Articles/Comments/CommentItem.vue";

export default {
  name: "ArticleComments",
  components: {CommentItem},

  props: {
    comments: {
      type: Array,
      default: () => []
    },
    pagination: {
      type: Object,
      default: () => {
      }
    }
  },

  data() {
    return {
      form: {
        title: null,
        message: null
      }
    }
  },

  methods: {
    async addComment() {
      this.$emit('addComment', this.form)
      this.form.title = null
      this.form.message = null
    }
  }


}
</script>

