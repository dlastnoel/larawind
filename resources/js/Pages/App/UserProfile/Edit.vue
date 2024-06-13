    <template>
    <AuthLayout>
        <PageHeader>
            <Breadcrumbs :items="[
                {
                    name: 'User Profile',
                    href: '#'
                }
            ]" />
        </PageHeader>
        <PageBody>
            <FormWrapper name="Profile" description="This information will be displayed publicly so be careful what you share.">
                <Form @submit="handleUserProfileSubmit" enctype="multipart/form-data">
                    <FormBody>
                        <div class="col-span-12 md:col-span-6">
                            <div class="p-3 border-2 border-dashed rounded-lg">
                                <InputLabel for="avatar">Avatar</InputLabel>
                                <div class="flex justify-start items-center gap-3">
                                    <img v-if="previewAvatar"
                                        :src="previewAvatar" class="rounded-full w-12 h-12" alt="Avatar" />
                                    <UserCircleIcon v-else
                                        class="w-12 h-12 text-gray-300" />
                                    <div>
                                        <span class="sr-only">Choose avatar</span>
                                        <Field as="input"
                                            v-slot="{ errorMessage }"
                                            type="file"
                                            name="avatar"
                                            label="Avatar"
                                            rules="ext:jpg,png"
                                            v-model="userProfileForm.avatar"
                                            class="block w-full text-sm file:px-3 file:py-2
                                                file:rounded-full file:border-0 file:text-sm file:font-semibold
                                                file:bg-sky-100 file:text-sky-600
                                                hover:file:bg-sky-200 hover:cursor-pointer file:transition-all file:duration-75"
                                        >   
                                            <InputError :message="errorMessage" />
                                            
                                        </Field>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6 hidden md:block">
                            <!--  -->
                        </div>

                        <div class="col-span-12 md:col-span-6">
                            <InputLabel for="firstname">First Name</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="firstname"
                                label="First Name"
                                rules="required"
                                v-model="userProfileForm.firstname"
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
                                v-model="userProfileForm.middlename"
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
                                v-model="userProfileForm.lastname"
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
                                v-model="userProfileForm.suffix"
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
                        <div class="col-span-12">
                            <InputLabel for="email">Email</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="email"
                                label="Email Address"
                                rules="required|email"
                                v-model="userProfileForm.email"
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
                    </FormBody>
                    <FormFooter>
                        <ButtonPrimary type="submit" :disabled="userProfileForm.processing">Update</ButtonPrimary>
                    </FormFooter>
                </Form>
            </FormWrapper>

            <!--  -->

            <FormWrapper name="Password" description="Remember to secure your account by using a strong combination of characters for your password.">
                <Form @submit="handleUserPasswordSubmit">
                    <FormBody>
                        <div class="col-span-12 relative">
                            <InputLabel for="password">Password</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="password"
                                label="Password"
                                rules="required"
                                v-model="userPasswordForm.password"
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
                        <div class="col-span-12 relative">
                            <InputLabel for="password_confirmation">Password Confirmation</InputLabel>
                            <Field 
                                v-slot="{ field, errorMessage }"
                                name="password_confirmation"
                                label="Password Confirmation"
                                rules="required|confirmed:@password"
                                v-model="userPasswordForm.password_confirmation"
                            >
                                <InputText
                                    :type="isPasswordConfirmationVisible ? 'text' : 'password'"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    placeholder="Password Confirmation"
                                    v-bind="field"
                                    :value="field.value" />

                                <EyeIcon v-if="isPasswordConfirmationVisible" @click="isPasswordConfirmationVisible = !isPasswordConfirmationVisible"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />

                                <EyeSlashIcon v-if="!isPasswordConfirmationVisible" @click="isPasswordConfirmationVisible = !isPasswordConfirmationVisible"
                                    class="w-4 h-4 absolute top-9 right-2 cursor-pointer" />
                                
                                <InputError :message="errorMessage" />
                                
                            </Field>
                        </div>
                    </FormBody>
                    <FormFooter>
                        <ButtonPrimary type="submit" :disabled="userPasswordForm.processing">Update</ButtonPrimary>
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
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import FormWrapper from '@/Components/FormWrapper.vue'
import FormBody from '@/Components/FormBody.vue'
import FormFooter from '@/Components/FormFooter.vue'
import InputText from '@/Components/InputText.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'

import { EyeIcon, EyeSlashIcon, UserCircleIcon } from '@heroicons/vue/24/solid'

import { Form, Field } from 'vee-validate'
import { ref, computed } from 'vue'
import { useForm, usePage } from '@inertiajs/vue3'
import useNotyf from '@/Composables/useNotyf'

// data
const page = usePage()

const userProfileForm = useForm({
    avatar: page.props.auth.user.data.avatar ?? '',
    firstname: page.props.auth.user.data.firstname,
    middlename: page.props.auth.user.data.middlename,
    lastname: page.props.auth.user.data.lastname,
    suffix: page.props.auth.user.data.suffix,
    email: page.props.auth.user.data.email,
})

const userPasswordForm = useForm({
    password: '',
    password_confirmation: '',
})

const isPasswordVisible = ref(false)
const isPasswordConfirmationVisible = ref(false)

// methods
function handleUserProfileSubmit(value, actions) {
    userProfileForm.post(route('user-profile.update'), {

        preserveScroll: true,

        onError: (errors) => {
            actions.setErrors(errors)
            useNotyf('error')
        },

        onSuccess: () => {
            useNotyf('info')
        },
    })
}

function handleUserPasswordSubmit(value, actions) {
    userPasswordForm.post(route('user-password.update'), {

        preserveScroll: true,

        onError: (errors) => {
            actions.setErrors(errors)
            useNotyf('error')
        },

        onSuccess: () => {
            actions.resetForm()
            useNotyf('info', 'Success! You may login again.')
        },
    })
}

const previewAvatar = computed(() => {

    if(userProfileForm.avatar) {
        return URL.createObjectURL(userProfileForm.avatar)
    }

    return ''
})

</script>