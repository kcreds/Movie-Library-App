<script setup>
import useMovies from '../composables/movies';
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';

const { getMovie, movie } = useMovies();
const router = useRouter();
const slug = ref('');
const error = ref('');

onMounted(() => {
  slug.value = router.currentRoute.value.params.slug;
  getMovie(slug.value);
});


</script>
<template>
  <div v-if="error" class="mt-2 text-center">
    <span class="test-sm text-red-400">{{ error }}</span>
  </div>

  <div v-else>
    <div class="mt-12">
      <div class="flex justify-center items-center">
        <div class=" flex flex-col items-center">
          <img class="w-1/3 h-1/3 border-white border-4" :src="`${APIBaseUrlStorage}${movie.image}`" alt="">
          <h1 class="mt-5 font-bold text-4xl">{{ movie.name }}</h1>
          <p class="mt-4 text-2xl">{{ movie.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>