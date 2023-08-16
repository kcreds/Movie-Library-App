<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header class="pb-10">

    <div class="max-w-7xl mx-auto">
      <nav class="bg-white bg-gradient-to-r from-violet-500 to-fuchsia-500 fixed w-full z-20 top-0 left-0 border-b">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="/" class="flex items-center">
            <img src="https://www.reshot.com/preview-assets/icons/46SRE7CN8U/crops-46SRE7CN8U.svg" class="h-8 mr-3"
              alt="Flowbite Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Movies</span>
          </a>
          <div class="flex md:order-2">
            <RouterLink class="px-4 py-2 mr-4 bg-pink-700 hover:bg-pink-600 rounded font-semibold text-white"
              to="/movies">
              Administrate
            </RouterLink>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
              class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-pink-600">
              <li>

              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <main class="max-w-7xl  mx-auto min-h-screen">
    <RouterView />
  </main>
</template>

