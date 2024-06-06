<template>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-white dark:text-gray-400 dark:bg-gray-800"
                >
                    <slot name="table-header"/>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <slot name="table-body"/>
                </tbody>
            </table>
        </div>
        <div v-if="$slots.footer"
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-white sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <slot name="footer"/>
        </div>
    </div>
</template>

<script setup>
</script>