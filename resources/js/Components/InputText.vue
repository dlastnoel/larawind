<template>
  <input
    class="w-full border rounded text-sm text-gray-800 px-3 py-2 font-medium"
    :class="inputHasError ? 'border-red-300' : 'border-gray-300'"
  />
</template>

<script setup>
import { useFieldError } from 'vee-validate'

const inputHasError = useFieldError()
</script>