<template>
  <select
    class="w-full border rounded text-sm text-gray-800 px-3 py-2 bg-white"
    :class="inputHasError ? 'border-red-300' : 'border-gray-300'"
    v-model="model"
  >
    <slot />
  </select>
</template>

<script setup>
import { useFieldError } from 'vee-validate'

const model = defineModel()
const inputHasError = useFieldError()
</script>