<template>
    <span
        class="text-xs px-2 py-1 font-semibold leading-tight rounded-full hover:brightness-95 transition-all duration-75"
        :class="{
            'bg-sky-100 text-sky-600 hover:cursor-pointer' : status === 'active', 
            'bg-red-100 text-red-600 hover:cursor-pointer' : status === 'deactivated', 
            'bg-gray-200 text-gray-600 hover:cursor-default' : status === 'terminated', 
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