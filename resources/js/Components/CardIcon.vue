<template>
    <div class="flex items-center p-4 bg-white rounded-lg shadow-sm bg-gray-800 hover:bg-gray-100 transition-all duration-75">
        <div
            class="p-3 mr-4 rounded-full"
            :class="`${iconBackground} ${iconColor}`">
            <Component :is="icon" class="h-6 w-6"/>
        </div>
        <div>
            <p class="mb-2 text-sm font-medium text-gray-600 text-gray-400">
            {{ title }}
            </p>
            <p class="text-lg font-semibold text-gray-700 text-gray-200">
            {{ content }}
            </p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    iconBackground: {
        type: String,
        default: 'bg-gray-100'
    },
    iconColor: {
        type: String,
        default: 'text-gray-800'
    },

    icon: {
        type: Object,
        required: true
    },

    title: {
        type: String,
        required: true
    },

    content: {
        type: String,
        required: true,
    }
})
</script>