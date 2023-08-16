<script setup>
import { reactive, ref } from 'vue';
import useMovies from '../../composables/movies';

const { storeMovie, errors } = useMovies();
const form = reactive({
    name: "",
    image: null,
    slug: "",
    length: "",
    director: "",
    screenplay: "",
    genere: "",
    production: "",
    premiere: "",
    score: "",
    status: "",
    description: "",

});

const generateSlug = () => {
    form.slug = form.slug
        .toLowerCase()
        .replace(/\s+/g, '-')
        .replace(/[^a-z0-9-]+/g, '');
};

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        form.image = file;
    }
};

</script>
<template>
    <div class="mt-12 pb-3">

        <!-- 'name', 'image', 'slug', 'length', 'director', 'screenplay', 'genre', 'production', 'premiere', 'description',
        'score', 'status' -->

        <form @submit.prevent="storeMovie(form)" class="max-w-xl  mx-auto bg-white shadow-md rounded-md"
            enctype="multipart/form-data">
            <div class="space-y-2 p-5">

                <div class="mb-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                    <input id="name" v-model="form.name" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.name"><span class="test-sm text-red-400">{{ errors.name[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="image">Movie cover</label>
                    <input name="image" @change="handleFileChange"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="image" type="file">
                </div>
                <div class="mb-2">
                    <div v-if="errors.image"><span class="text-sm text-red-400">{{ errors.image[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 ">Slug</label>
                    <input type="text" v-model="form.slug" id="slug"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        @input="generateSlug" />
                </div>
                <div class="mb-2">
                    <div v-if="errors.slug"><span class="test-sm text-red-400">{{ errors.slug[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="director" class="block mb-2 text-sm font-medium text-gray-900 ">Director</label>
                    <input id="director" v-model="form.director" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.director"><span class="test-sm text-red-400">{{ errors.director[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="screenplay" class="block mb-2 text-sm font-medium text-gray-900 ">Screenplay</label>
                    <input id="screenplay" v-model="form.screenplay" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.screenplay"><span class="test-sm text-red-400">{{ errors.screenplay[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="length" class="block mb-2 text-sm font-medium text-gray-900 ">Movie Length</label>
                    <input id="length" v-model="form.length" type="time"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.length"><span class="test-sm text-red-400">{{ errors.length[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 ">Genre</label>
                    <input id="genre" v-model="form.genre" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.genre"><span class="test-sm text-red-400">{{ errors.genre[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="production" class="block mb-2 text-sm font-medium text-gray-900 ">Production</label>
                    <input id="production" v-model="form.production" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.production"><span class="test-sm text-red-400">{{ errors.production[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="premiere" class="block mb-2 text-sm font-medium text-gray-900 ">Premiere</label>
                    <input id="premiere" v-model="form.premiere" type="date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-2">
                    <div v-if="errors.premiere"><span class="test-sm text-red-400">{{ errors.premiere[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="score" class="block mb-2 text-sm font-medium text-gray-900 ">Rate</label>
                    <select id="score" v-model="form.score" type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Not viewed">To rate</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Star</option>
                        <option value="3">3 Star</option>
                        <option value="4">4 Star</option>
                        <option value="5">5 Star</option>
                    </select>
                </div>
                <div class="mb-2">
                    <div v-if="errors.score"><span class="test-sm text-red-400">{{ errors.score[0] }}</span></div>
                </div>

                <div class="mb-2">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <select id="status" v-model="form.status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Not viewed">Not viewed</option>
                        <option value="Watched">Watched</option>
                        <option value="To view">To view</option>
                        <option value="To review">To review</option>
                    </select>
                </div>
                <div class="mb-2">
                    <div v-if="errors.status"><span class="test-sm text-red-400">{{ errors.status[0] }}</span></div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                    <textarea id="description" v-model="form.description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder=""></textarea>
                </div>
                <div class="mb-2">
                    <div v-if="errors.description"><span class="test-sm text-red-400">{{ errors.description[0] }}</span>
                    </div>
                </div>



                <div class="mt-4">
                    <button class="px-4 py-2 bg-indigo-700 rounded text-white hover:bg-indigo-800 "
                        type="submit">Store</button>
                </div>
            </div>
        </form>

    </div>
</template>