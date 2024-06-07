<template>
    <div class="h-screen w-full grid grid-cols-12">
    <!-- left screen -->
    <div class="col-span-12 md:col-span-6 h-full grid place-content-center gap-2">

        <img src="/assets/svg/app.svg" alt="" class="md:hidden w-[250px] my-3 m-auto" />
        <h1 class="text-center text-4xl text-sky-500">{{ appName }}.</h1>

        <div class="rounded-xl shadow-lg w-[400px] p-7">

            <h3 class="text-3xl font-medium text-gray-800 mt-4">Welcome back!</h3>
            <p class="text-base text-gray-800 mt-3">Login to access your account.</p>
            
            <Form class="mt-5 grid place-content-center gap-7">
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
                <div>
                <InputLabel for="password">Password</InputLabel>
                <Field
                    v-slot="{ field, errorMessage }"
                    name="password"
                    label="Password"
                    rules="required"
                    v-model="form.password"
                >
                    <InputText
                    type="password"
                    name="password"
                    id="password"
                    placeholder="********"
                    v-bind="field"
                    :value="field.value"
                    />

                    <InputError :message="errorMessage" />
                </Field>
                </div>
                <div>
                <Link :href="route('users.index')">
                    <ButtonPrimary class="w-full"> Login </ButtonPrimary>
                </Link>
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

import { Form, Field } from 'vee-validate'
import { appName } from '@/Utils/constants'

const form = {
    email: '',
    password: '',
}

</script>

<style>
</style>