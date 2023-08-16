import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/movies/:slug',
      name: 'SingleMovie',
      component: () => import('../views/SingleMovie.vue'),
      props: true,
    },
    {
      path: '/movies',
      name: 'MovieIndex',
      component: () => import('../views/movies/MovieIndex.vue')
    },
    {
      path: '/movies/create',
      name: 'MovieCreate',
      component: () => import('../views/movies/MovieCreate.vue')
    },
    {
      path: '/movies/:id/edit',
      name: 'MovieEdit',
      component: () => import('../views/movies/MovieEdit.vue'),
      props: true,
    },
  ]
})

export default router;
