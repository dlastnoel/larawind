<template>
    <div class="h-screen w-full grid grid-cols-12">
        <!-- left screen -->
        <div class="col-span-12 md:col-span-6 h-full grid place-content-center gap-2">

            <img src="/assets/svg/app.svg" alt="" class="md:hidden w-[250px] my-3 m-auto" />
            <h1 class="text-center text-4xl text-sky-500">{{ appName }}.</h1>

            <div class="rounded-xl shadow-lg w-[400px] p-7">

                <h3 class="text-3xl font-medium text-gray-800 mt-4">Welcome back!</h3>
                <p class="text-base text-gray-800 mt-3">Login to access your account.</p>
                
                <Form @submit="handleSubmit"
                    class="mt-5 grid place-content-center gap-7">
                    <div>
                        <InputLabel for="email">Email Address</InputLabel>

                        <Field
                            v-slot="{ field, errorMessage }"
                            name="email"
                            label="Email Address"
                            rules="required|email"
                            v-model="form.email"
                        >
                            <InputText
                            type="text"
                            name="email"
                            id="email"
                            placeholder="johndoe@example.com"
                            v-bind="field"
                            :value="field.value"
                            />

                            <InputError :message="errorMessage" />
                        </Field>
                    </div>
                    <div class="relative">
                        <InputLabel for="password">Password</InputLabel>
                        <Field
                            v-slot="{ field, errorMessage }"
                            name="password"
                            label="Password"
                            rules="required"
                            v-model="form.password"
                        >
                            <InputText
                            :type="isPasswordVisible ? 'text' : 'password'"
                            name="password"
                            id="password"
                            placeholder="********"
                            v-bind="field"
                            :value="field.value"
                            >
                            </InputText>

                            <EyeIcon v-if="isPasswordVisible" @click="isPasswordVisible = !isPasswordVisible"
                                class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />

                            <EyeSlashIcon v-if="!isPasswordVisible" @click="isPasswordVisible = !isPasswordVisible"
                                class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />


                            <InputError :message="errorMessage" />
                        </Field>
                    </div>
                    <div>
                    <ButtonPrimary class="w-full" :disabled="form.processing">Login</ButtonPrimary>
                    </div>
                </Form>

            </div>
        </div>

        <!-- right screen -->
        <div class="hidden md:grid h-full bg-[#fffcfc] place-content-center col-span-6">
            <img src="/assets/svg/app.svg" alt="" class="w-[400px]" />
        </div>
    </div>
</template>

<script setup>
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import InputText from '@/Components/InputText.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'

import { EyeIcon, EyeSlashIcon } from '@heroicons/vue/24/solid'

import { ref } from 'vue'
import { Form, Field } from 'vee-validate'
import { appName } from '@/Utils/constants'
import { useForm } from '@inertiajs/vue3'
import useNotyf from '@/Composables/useNotyf'

const props = defineProps({
    errors: Object
})

//  data
const form = useForm({
    email: 'admin@larawind.com',
    password: 'password',
})

const isPasswordVisible = ref(false)

// methods
function handleSubmit(value, actions) {

    form.post(route('auth.store'), {

        
        onError: (errors) => {
            actions.setErrors(errors)
            useNotyf('error')
        },

        onSuccess: () => {
            useNotyf('info', 'Welcome!')
        }
    })
}

</script>

<style>
</style>