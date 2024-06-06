<template>
  <div class="space-y-10 divide-y divide-gray-900/10">
    <div class="grid grid-cols-12 gap-x-8 gap-y-8 pt-10">
      <div class="px-4 sm:px-0 col-span-12 md:col-span-4">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
          {{ name }}
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
          {{ description }}
        </p>
      </div>
      <div
        class="bg-white shadow-sm ring-1 ring-gray-900/5 rounded-xl col-span-12 md:col-span-8"
      >
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  name: {
    type: String,
    required: true
  },
  description: {
    type: String,
    required: true
  }
})
</script>

<style>
</style>