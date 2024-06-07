<template>
    <span
        class="text-xs px-2 py-1 font-semibold leading-tight rounded-full"
        :class="{
            'bg-sky-100 text-sky-600' : status === 'active', 
            'bg-red-100 text-red-600' : status === 'deactivated', 
            'bg-gray-200 text-gray-600' : status === 'terminated', 
        }"
    >
        {{ status }}
    </span>
</template>

<script setup>
defineProps({
    status: {
        type: String,
        required: true
    }
})
</script>