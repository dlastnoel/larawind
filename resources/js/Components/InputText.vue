<template>
  <input
    class="w-full border rounded text-sm text-gray-800 px-3 py-2"
    :class="inputHasError ? 'border-red-300' : 'border-gray-200'"
    v-model="model"
  />
</template>

<script setup>
import { useFieldError } from 'vee-validate'

const model = defineModel()
const inputHasError = useFieldError()
</script>