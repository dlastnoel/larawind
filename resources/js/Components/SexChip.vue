<template>
    <span
        class="text-xs px-2 py-1 font-semibold leading-tight rounded-full"
        :class="sex === 'Male' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700'"
    >
        {{ sex }}
    </span>
</template>

<script setup>
defineProps({
    sex: {
        type: String,
        required: true
    }
})
</script>