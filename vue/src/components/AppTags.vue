<template>
  <div class="card">
    <div class="card-header">
      <h2>Tags</h2>
    </div>
    <div class="card-body">
      <button
          v-for="tag in option"
          :key="tag.id"
          @click="toggleTagParams(tag.id)"
          class="'btn badge m-1'"
          :class="[modelValue.includes(tag.id) ? 'text-bg-primary' : 'text-bg-secondary']"
      >
        {{ tag.title }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "AppTags",

  props: {
    modelValue: {
      type: Array,
      default: () => []
    },
    option: {
      type: Array,
      default: () => []
    },
  },

  methods: {
    toggleTagParams(tagId) {
      let tags = this.modelValue

      !tags.includes(tagId)
          ? tags.push(tagId)
          : tags = tags.filter((number) => number !== tagId);

      this.$emit('update:modelValue', tags)
    }
  }


}
</script>