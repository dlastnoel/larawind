<template>
  <aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white"
  >
    <div class="py-4 text-gray-500">
      <h1 class="mt-2 text-sky-500 font-medium text-2xl text-center">
        {{ appName }}
      </h1>
      <ul class="mt-6">
        <li class="relative px-3" v-for="(sidebarLink, i) in links" :key="i">
          <Link
            :href="route(sidebarLink.route)"
            class="rounded-lg mt-4 px-5 py-3 inline-flex items-center w-full text-base font-semibold transition-all duration-100 hover:bg-sky-500 hover:text-white"
            :class="
              sidebarLink.active.includes($page.component)
                ? 'bg-sky-500 text-white'
                : 'bg-white text-gray-800'
            "
          >
            <span v-html="sidebarLink.svg"></span>
            <span class="ml-4">{{ sidebarLink.title }}</span>
          </Link>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script setup>
import { appName, sidebarLinks } from '@/Utils/constants'

</script>

<style>
</style>