<script setup>
import {useRoute} from "vue-router";

const route = useRoute()
</script>
<template>
  <div id="app">
    <h1 class="text-center text-2xl py-5">Todo Crud Application with Laravel & Vuejs</h1>
    <div class="mb-4 border-b border-gray-200">
      <ul class="flex flex-wrap justify-center text-sm font-medium text-center text-gray-500">
        <li class="me-2">
          <router-link
              to="/"
              class="inline-block px-4 py-3 rounded-lg"
              :active-class="route.path === '/' ? 'bg-blue-600 text-white' : ''"
          >
            Todo List
          </router-link>
        </li>
        <li class="me-2">
          <router-link
              to="/todo/create"
              class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100"
              :active-class="route.path === '/' ? 'bg-blue-600 text-white' : ''"
          >
            Create New
          </router-link>
        </li>
      </ul>
    </div>

    <router-view></router-view>
  </div>
</template>
