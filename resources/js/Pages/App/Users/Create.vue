<template>
    <AuthLayout>
        <PageHeader>
            <Breadcrumbs :items="[
                {
                    name: 'Users',
                    link: ''
                },
                {
                    name: 'Create',
                    link: ''
                },
            ]" />
        </PageHeader>
        <PageBody>
            <FormWrapper name="User" description="This information will be displayed publicly so be careful what you share.">
                <Form>
                    <FormBody></FormBody>
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
import FormFooter from '@/Components/FormWrapper.vue'

import { Form, Field } from 'vee-validate'
</script>