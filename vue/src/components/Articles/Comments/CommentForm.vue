<template>
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
</template>

<script>
export default {
  name: "CommentForm",
  data() {
    return {
      form: {
        title: null,
        message: null
      }
    }
  },

  methods: {
    addComment() {
      this.$emit('addComment', structuredClone(this.form))
      this.form.title = null
      this.form.message = null
    }
  }
}
</script>