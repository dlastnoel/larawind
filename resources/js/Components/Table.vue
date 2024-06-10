<template>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-white"
                >
                    <slot name="header"/>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    <slot name="body"/>
                </tbody>
            </table>
        </div>
        <div v-if="$slots.footer"
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-white sm:grid-cols-9">
            <slot name="footer"/>
        </div>
    </div>
</template>

<script setup>
</script>