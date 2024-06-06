<template>
  <small class="text-xs text-red-600" v-if="message">
    {{ message }}
  </small>
</template>

<script setup>

defineProps({
  message: {
    type: String,
    default: ''
  }
})
</script>