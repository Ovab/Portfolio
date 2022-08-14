<template>
  <div class="flex flex-col justify-center items-center h-max bg-gray-800">
    <h1 class="text-white text-9xl mb-10">Bavo Knol</h1>
    <div class="text-white text-6xl mb-10">
      <h2>Full stack developer</h2>
    </div>
  </div>


  <div class="grid grid-cols-4 grid-rows-1">
    <div class="p-2 h-80 w-full bg-[#0f2b5a] text-white
                hover:bg-[#4fbcfa] hover:text-gray-800
                transition duration-500">
      <div class="flex justify-center">
        <h3 class="text-2xl">Jasper's media</h3>
      </div>
      <p class="mt-2">
        After completing my internship, I was offered a job to work there under a 0-hour contract<br>
      </p>
      <div class="mt-3 flex flex-row gap-2">
        <LanguageTag tag="Nuxt.js" tagColor="#58d887" />
        <LanguageTag tag="TailwindCSS" tagColor="#5dbaf5" />
        <LanguageTag tag="Laravel" tagColor="#e94933" />
      </div>
    </div>

    <div class="p-2 h-80 w-full bg-teal-700 text-white
                hover:bg-teal-400 hover:text-gray-800
                transition duration-500">
      <div class="flex justify-center">
        <h3 class="text-2xl">Rijschool vierkante wielen</h3>
      </div>
      <p class="mt-2">
        This was my school exam project I made in a week, it is a planning system<br>
        for driving schools where I did the most dificult tasks<br>
      </p>
      <div class="mt-3 flex flex-row gap-2">
        <LanguageTag tag="Nuxt.js" tagColor="#58d887" />
        <LanguageTag tag="TailwindCSS" tagColor="#5dbaf5" />
        <LanguageTag tag="Laravel" tagColor="#e94933" />
      </div>
    </div>


  </div>
</template>

<script>
export default {
  name: "index",
}
</script>

<style scoped>
  body{
    @apply bg-gray-800;
  }
</style>