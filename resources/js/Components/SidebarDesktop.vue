<template>
  <aside
    class="z-20 hidden md:w-56 w-64 overflow-y-auto bg-white md:block flex-shrink-0 shadow"
  >
    <div class="py-4 text-gray-500">
      <h1 class="mt-2 text-sky-500 font-medium text-2xl text-center">{{ appName }}</h1>
      <ul class="mt-6">
        <li class="relative px-3" v-for="(sidebarLink, i) in sidebarLinks" :key="i">
          <SidebarLink :item="sidebarLink" />
        </li>
      </ul>
    </div>

  </aside>
</template>

<script setup>
import { appName }  from '@/Utils/constants'
import { sidebarLinks }  from '@/Utils/links'
import SidebarLink from '@/Components/SidebarLink.vue'

</script>

<style>
</style>