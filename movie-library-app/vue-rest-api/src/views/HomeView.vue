<script setup>
import { RouterLink } from 'vue-router';
import useMovies from '../composables/movies';
import { onMounted } from 'vue';

const { movies, getMovies, destroyMovie } = useMovies();

onMounted(() => getMovies());

const generateStars = (score) => {
  const maxStars = 5;
  const filledStars = score;
  const grayStars = maxStars - score;

  const stars = [];

  for (let i = 0; i < filledStars; i++) {
    stars.push(`<svg class="w-8 h-8 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>`);
  }

  for (let i = 0; i < grayStars; i++) {
    stars.push(`<svg class="w-8 h-8 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
    </svg>`);
  }

  return stars.join('');
};
</script>

<template>
  <main class="mt-10">

    <div class="grid grid-cols-2 gap-4">

      <div v-for="movie in movies" :key="movie.id">
        <router-link :to="{ name: 'SingleMovie', params: { slug: movie.id } }">
          <div class="py-3 sm:max-w-xl sm:mx-auto mt-10 mb-5">
            <div class="bg-white shadow-lg  bg-opacity-60 h-80 border-gray-200 border sm:rounded-3xl p-8 flex space-x-8"
              style="backdrop-filter: blur(20px);">
              <div class="h-48 overflow-visible w-1/2">
                <img class="rounded-3xl shadow-lg" :src="`${APIBaseUrlStorage}${movie.image}`" alt="">
              </div>
              <div class="flex flex-col w-1/2 space-y-4">
                <div class="flex justify-between items-start">
                  <h2 class="text-3xl font-bold pr-2">{{ movie.name }}</h2>
                  <div
                    :class="`bg-yellow-400 ${movie.status === 'Watched' ? 'bg-green-400' : ''} font-bold rounded-xl p-2`">
                    {{ movie.status }}
                  </div>
                </div>
                <div>
                  <div class="text-sm text-gray-700">Length: <span class="">{{ movie.length }}</span></div>
                  <div class="text-sm text-gray-700">Premiere: <span class="">{{ movie.premiere }}</span></div>
                  <div class="text-sm text-gray-700">Director: <span class="">{{ movie.director }}</span></div>
                </div>
                <div class="flex text-lg font-bold text-a">
                  <span class="flex space-x-1" v-if="movie.score >= 1 && movie.score <= 5"
                    v-html="generateStars(movie.score)"></span>
                  <span v-else>Rate: {{ movie.score }} </span>
                </div>
              </div>

            </div>
          </div>
        </router-link>
      </div>
    </div>


  </main>
</template>
