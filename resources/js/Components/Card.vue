<template>
    <div class="p-6 rounded-lg shadow-sm" :class="color">
        <slot/>
    </div>
</template>

<script setup>
defineProps({
    color: {
        type: String,
        default: 'bg-white'
    }
})
</script>