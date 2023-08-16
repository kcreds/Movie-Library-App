import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";

export default function useMovies() {

    const movies = ref([]);
    const movie = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getMovies = async () => {
        const response = await axios.get("http://127.0.0.1:8000/api/v1/movies");
        movies.value = response.data.data;
    };

    const getSingleMovie = async (slug) => {
        try {
            const response = await axios.get("movies/" + slug);
            movie.value = response.data.data;
        } catch (error) {
            if (error.response && error.response.status === 404) {
                error.value = 'Movie not found';
            } else {
                error.value = 'An error occurred while fetching the movie';
            }
        }
    };

    const getMovie = async (id) => {
        try {
            const response = await axios.get("movies/" + id);
            movie.value = response.data.data;
        } catch (error) {
            if (error.response && error.response.status === 404) {
                error.value = 'Movie not found';
            } else {
                error.value = 'An error occurred while fetching the movie';
            }
        }
    };

    const storeMovie = async (formData) => {
        try {
            await axios.post("movies", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            router.push({ name: "MovieIndex" });
        } catch (error) {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };

    const updateMovie = async (id) => {
        try {
            const formData = new FormData();
            formData.append("_method", "PUT")
            formData.append('name', movie.value.name);
            formData.append('slug', movie.value.slug);
            formData.append('length', movie.value.length);
            formData.append('director', movie.value.director);
            formData.append('screenplay', movie.value.screenplay);
            formData.append('genre', movie.value.genre);
            formData.append('production', movie.value.production);
            formData.append('premiere', movie.value.premiere);
            formData.append('description', movie.value.description);
            formData.append('score', movie.value.score);
            formData.append('status', movie.value.status);

            if (typeof movie.image === 'object') {
                formData.append('image', movie.image);
            }

            await axios.post(`movies/${id}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            router.push({ name: "MovieIndex" });
        } catch (error) {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    };


    const destroyMovie = async (id) => {
        try {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await axios.delete("movies/" + id);
            await getMovies();
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    return {
        movie,
        movies,
        getMovie,
        getSingleMovie,
        getMovies,
        storeMovie,
        updateMovie,
        destroyMovie,
        errors,
    };
}