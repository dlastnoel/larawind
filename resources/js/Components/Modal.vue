<template>
    <!-- backdrop -->
    <div v-if="isModalVisible"
        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">

        <!-- modal -->
        <div
            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl"
        >
            <div v-if="header"
                class="flex justify-end">
                <button @click="isModalVisible = false"
                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded hover:text-gray-700"
                >
                    <XMarkIcon class="w-4 h-4" />
                </button>
            </div>

            <!-- body -->
            <div class="mt-4 mb-6">

                <template v-if="$slots.title">
                    <slot name="title" />
                </template>

                <p v-if="title"
                    class="mb-2 text-lg font-semibold text-gray-800">
                    {{ title }}
                </p>

                <template v-if="$slots.body">
                    <p class="text-sm text-gray-800">
                        <slot name="body" />
                    </p>
                </template>
                
                <p v-if="body"
                    class="text-sm text-gray-800">
                    <slot name="body" />
                </p>

            </div>

            <!-- footer -->
            <footer v-if="$slots.footer"
                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50">
                <slot name="footer" />
            </footer>
        </div>
    </div>
</template>

<script setup>
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import ButtonMuted from '@/Components/ButtonMuted.vue'

import { XMarkIcon } from '@heroicons/vue/20/solid'

defineProps({
    header: {
        type: Boolean,
        default: true
    },
    title: {
        type: String,
        default: '',
    },
    body: {
        type: String,
        default: ''
    }
})

const isModalVisible = defineModel({
    type: Boolean,
    default: false
})
</script>