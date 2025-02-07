<style scoped>
.input-image {
  max-width: 100%;
  max-height: 100%;
  border-radius: 1px;
}
</style>

<template>

  <div class="row justify-content-center">

    <p class="form-label">Images</p>

    <div v-show="modelValue" class="col-12">
      <img class="input-image" :src="modelValue">
    </div>

    <div class="col-12 mt-3">
      <input
          @change="previewThumbnail"
          class="form-control form-control-sm"
          id="formFileSm"
          name="article_image"
          type="file"
      >
    </div>
  </div>

</template>


<script>
export default {
  name: "FormImage",
  props: {
    modelValue: {
      type: String,
      default: null
    }
  },

  methods: {
    previewThumbnail: function (event) {
      let file = event.target.files[0];

      if (file) {
        let reader = new FileReader();

        reader.onload = (e) => {
          this.$emit('update:modelValue', e.target.result)
        }
        this.$emit('setFile', file)
        reader.readAsDataURL(file);
      }
    }
  }
}
</script>