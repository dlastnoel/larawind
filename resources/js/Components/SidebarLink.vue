<template>
    <Link :href="item.href"
        class="rounded-lg mt-4 px-5 py-3 inline-flex items-center w-full text-base font-semibold transition-all duration-100 hover:bg-sky-500 hover:text-white hover:cursor-pointer"
        :class="{ 'bg-sky-500 text-white' : item.active }"
    >
        <Component :is="item.svg" class="h-6 w-6" />
        <span class="ml-4">{{ item.name }}</span>
    </Link>
</template>

<script setup>
defineProps({
    item: {
        type: Object,
        required: true,
    }
})
</script>