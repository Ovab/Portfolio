<template>
  <div v-if="tag"
       class="p-1 drop-shadow-2xl rounded w-fit text-gray-800 font-medium drop-shadow-2xl border-black"
      :style="{'background-color': tagColor}">
    {{tag}}
  </div>

</template>

<script>
export default {
  name: "LanguageTag",

  props:{
    tag: {
      type: String,
      required: true
    },
    tagColor: {
      type: String,
      required: true
    }
  },
}
</script>

<style scoped>

</style>