<script setup>
import { RouterLink } from 'vue-router';
import useMovies from '../../composables/movies';
import { onMounted } from 'vue';

const { movies, getMovies, destroyMovie } = useMovies();

onMounted(() => getMovies());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink class="px-4 py-2 bg-indigo-700 rounded text-white hover:bg-indigo-800 "
                :to="{ name: 'MovieCreate' }">
                Add Movie</RouterLink>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Slug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Movie Cover
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="movie in movies" :key="movie.id"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ movie.name }}
                        </td>
                        <td scope="row" class="px-6  py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ movie.slug }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-20 h-20" :src="`${APIBaseUrlStorage}${movie.image}`" alt="">
                        </td>
                        <td scope="row"
                            class="px-6 space-x-2 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <RouterLink :to="{ name: 'MovieEdit', params: { id: movie.id } }"
                                class="px-4 py-2 bg-green-700 rounded text-white hover:bg-green-800">Edit</RouterLink>
                            <button @click="destroyMovie(movie.id)"
                                class="px-4 py-2 bg-red-700 rounded text-white hover:bg-red-800">Delete</button>
                        </td>
                    </tr>
                    <p v-if="movies == 0"
                        class="px-6 py-4 bg-center text-2xl font-bold text-gray-900 whitespace-nowrap dark:text-white">
                        No movies</p>
                </tbody>
            </table>
        </div>
    </div>
</template>