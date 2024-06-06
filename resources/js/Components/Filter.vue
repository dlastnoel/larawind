<template>
  <div>
    <div
      @click="isFilterVisible = !isFilterVisible"
      class="w-full shadow-sm bg-white px-6 py-4 transition-colors duration-75 hover:bg-gray-100 hover:cursor-pointer"
      :class="!isFilterVisible ? 'mb-4 rounded' : 'rounded-t-lg'"
    >
      <span
        class="flex justify-between items-center text-sm font-medium tracking-wide text-gray-800"
      >
        {{ name }}

        <ChevronDownIcon
          v-if="!isFilterVisible"
          class="w-5 h-5 hover:cursor-pointer"
          @click="isFilterVisible = !isFilterVisible"
        />

        <ChevronUpIcon
          v-if="isFilterVisible"
          class="w-5 h-5 hover:cursor-pointer"
          @click="isFilterVisible = !isFilterVisible"
        />
      </span>
    </div>
    <div
      v-if="isFilterVisible"
      class="bg-white rounded-b-lg px-6 pt-4 pb-6 mb-5 drop-shadow-sm"
    >
      <slot />
    </div>
  </div>
</template>

<script setup>
import { ChevronDownIcon, ChevronUpIcon } from '@heroicons/vue/24/solid'

defineProps({
  name: {
    type: String,
    default: 'Search & Filter'
  }
})

const isFilterVisible = defineModel({
  type: Boolean,
  default: false
})
</script>