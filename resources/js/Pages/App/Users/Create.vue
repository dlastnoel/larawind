<template>
    <AuthLayout>
        <PageHeader>
            <Breadcrumbs :items="[
                {
                    name: 'Users',
                    href: route('users.index')
                },
                {
                    name: 'Create',
                    href: '#'
                },
            ]" />
        </PageHeader>
        <PageBody>
            <FormWrapper name="User" description="This information will be displayed publicly so be careful what you share.">
                <Form @submit="handleSubmit">
                    <FormBody>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="firstname">First Name</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="firstname"
                                label="First Name"
                                rules="required"
                                v-model="form.firstname"
                            >
                                <InputText
                                    name="firstname"
                                    id="firstname"
                                    placeholder="First Name"
                                    v-bind="field"
                                    :value="field.value" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="middlename">Middle Name</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="middlename"
                                label="Middle Name"
                                v-model="form.middlename"
                            >
                                <InputText
                                    name="middlename"
                                    id="middlename"
                                    placeholder="Middle Name"
                                    v-bind="field"
                                    :value="field.value" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="lastname">Last Name</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="lastname"
                                label="Last Name"
                                rules="required"
                                v-model="form.lastname"
                            >
                                <InputText
                                    name="lastname"
                                    id="lastname"
                                    placeholder="Last Name"
                                    v-bind="field"
                                    :value="field.value" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="suffix">Suffix</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="suffix"
                                label="Suffix"
                                v-model="form.suffix"
                            >
                                <InputText
                                    name="suffix"
                                    id="suffix"
                                    placeholder="Suffix"
                                    v-bind="field"
                                    :value="field.value" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="email">Email</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="email"
                                label="Email Address"
                                rules="required|email"
                                v-model="form.email"
                            >
                                <InputText
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Email Address"
                                    v-bind="field"
                                    :value="field.value" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="role">Role</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="role"
                                label="Role"
                                rules="required"
                                v-model="form.role"
                            >
                                <InputSelect
                                    name="role"
                                    id="role"
                                    placeholder="Role"
                                    v-bind="field"
                                    :value="field.value"
                                    class="capitalize">
                                    
                                    <option v-for="(role, i) in formOptions.roles" :key="i"
                                        :value="role">{{ role }}</option>
                                </InputSelect>
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6 relative">
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
                                    placeholder="Password"
                                    v-bind="field"
                                    :value="field.value" />

                                <EyeIcon v-if="isPasswordVisible" @click="isPasswordVisible = !isPasswordVisible"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />

                                <EyeSlashIcon v-if="!isPasswordVisible" @click="isPasswordVisible = !isPasswordVisible"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                        <div class="col-span-12 md:col-span-6 relative">
                            <InputLabel for="password_confirmation">Password Confirmation</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="password_confirmation"
                                label="Password Confirmation"
                                rules="required|confirmed:password"
                                v-model="form.password_confirmation"
                            >
                                <InputText
                                    :type="isPasswordConfirmation ? 'text' : 'password'"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Password Confirmation"
                                    v-bind="field"
                                    :value="field.value" />

                                <EyeIcon v-if="isPasswordConfirmation" @click="isPasswordConfirmation = !isPasswordConfirmation"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />

                                <EyeSlashIcon v-if="!isPasswordConfirmation" @click="isPasswordConfirmation = !isPasswordConfirmation"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                    </FormBody>
                    <FormFooter>
                        <ButtonPrimary type="submit" :disabled="form.processing">Create</ButtonPrimary>
                    </FormFooter>
                </Form>
            </FormWrapper>
        </PageBody>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import PageBody from '@/Components/PageBody.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import FormWrapper from '@/Components/FormWrapper.vue'
import FormBody from '@/Components/FormBody.vue'
import FormFooter from '@/Components/FormFooter.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputText from '@/Components/InputText.vue'
import InputError from '@/Components/InputError.vue'
import InputSelect from '@/Components/InputSelect.vue'

import { EyeIcon, EyeSlashIcon } from '@heroicons/vue/24/solid'

import { ref } from 'vue'
import { Form, Field } from 'vee-validate'
import { useForm } from '@inertiajs/vue3'
import { roles } from '@/Utils/forms'
import useToast from '@/Composables/useToast'

// props
const props = defineProps({
    errors: Object
})

// data
const form = useForm({
    firstname: 'John',
    middlename: '',
    lastname: 'Doe',
    suffix: '',
    email: 'johndoe@larawind.com',
    role: 'user',
    password: 'password',
    password_confirmation: 'password',
})

const formOptions = {
    roles: roles
}

const isPasswordVisible = ref(false)
const isPasswordConfirmation = ref(false)

// methods
function handleSubmit(values, actions) {

    form.post(route('users.store'), {

        preserveState: true,
        preserveScroll: true,
        
        onError: (errors) => {
            actions.setErrors(errors)
            useToast('error', 'Error creating user.')
        },

        onSuccess: () => {
            useToast('info', 'User created successfully.')
        }
    })
}
</script>