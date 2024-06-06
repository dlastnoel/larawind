<template>
  <ul class="flex justify-start items-center gap-2">
    <template v-if="items.length === 1">
      <li
        class="text-lg font-medium text-gray-800 hover:cursor-pointer hover:underline transition-all duration-75"
      >
        {{ items[0].name }}
      </li>
    </template>
    <template v-else>
      <template v-for="(item, i) in items" :key="i">
        <li
          class="text-lg font-medium text-gray-800 hover:cursor-pointer hover:underline transition-all duration-75"
        >
          {{ item.name }}
        </li>
        <li v-if="i + 1 !== items.length">
          <ChevronRightIcon class="w-4 h-4" />
        </li>
      </template>
    </template>
  </ul>
</template>

<script setup>
import { ChevronRightIcon  } from '@heroicons/vue/24/solid'

defineProps({
  items: {
    type: Object,
    required: true,
  }
})

</script>