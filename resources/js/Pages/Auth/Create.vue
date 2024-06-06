<template>
    <div class="h-screen w-full grid grid-cols-12">
    <!-- left screen -->
    <div class="col-span-12 md:col-span-6 h-full grid place-content-center gap-2">

        <img src="/assets/svg/login.svg" alt="" class="md:hidden w-[250px] my-3 m-auto" />
        <h1 class="text-center text-4xl text-blue-600">larawind.</h1>

        <div class="rounded shadow-md w-[350px] p-7 border">
        <Form class="grid place-content-center gap-9">
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
            <ButtonPrimary class="w-full"> Login </ButtonPrimary>
            </div>
        </Form>
        </div>
    </div>

    <!-- right screen -->
    <div class="hidden md:grid h-full bg-gray-100 place-content-center col-span-6">
        <img src="/assets/svg/login.svg" alt="" class="w-[400px]" />
    </div>
    </div>
</template>

<script setup>
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import InputText from '@/Components/InputText.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'

import { Form, Field } from 'vee-validate'

const form = {
    email: '',
    password: '',
}

</script>

<style>
</style>