<template>
    <span class="flex items-center col-span-3 uppercase">
        Showing {{ meta.from }}-{{ meta.to }} of {{ meta.total }}
    </span>

    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
            <ul class="inline-flex items-center justify-start gap-1">
                <li v-for="(link, i) in meta.links" :key="i">
                    <template v-if="link.url">
                        <Link
                            class="px-3 py-1 rounded-md rounded-l-lg disabled:text-gray-400 transition-all duration-75"
                            :class="link.active ? 'bg-sky-600 text-white hover:bg-sky-700' : 'hover:bg-sky-600 hover:text-white'"
                            as="button"
                            :href="link.url"
                            preserve-scroll
                            preserve-state
                            :only="only"
                            :disabled="!link.url"
                            >
                            <span v-html="link.label"></span>
                        </Link>
                    </template>
                    <template v-else>
                        <span v-html="link.label"
                            class="px-3 py-1 rounded-md rounded-l-lg text-gray-400 transition-all duration-75">
                        </span>
                    </template>
                </li>
            </ul>
        </nav>
    </span>
</template>

<script setup>
defineProps({

    meta: {
        type: Object,
        required: true,
    },

    only: {
        type: Array,
        default: []
    }
})
</script>