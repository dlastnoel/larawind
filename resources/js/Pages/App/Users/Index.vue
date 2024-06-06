<template>
    <AuthLayout>
    <PageHeader>
        <Breadcrumbs
        :items="[
            {
            name: 'Users',
            link: '#',
            },
        ]"
        />
        <ButtonPrimary>Create</ButtonPrimary>
    </PageHeader>
    <PageBody>
        <Filter>
        <Form class="grid grid-cols-12 gap-2">
            <div class="col-span-6">
            <Field
                v-slot="{ field }"
                name="query"
                label="Search"
                v-model="filterForm.query"
            >
                <InputLabel for="query">Search</InputLabel>
                <InputText
                type="text"
                name="query"
                id="query"
                v-bind="field"
                :value="field.value"
                placeholder="Search"
                />
            </Field>
            </div>
            <div class="col-span-2">
            <Field
                v-slot="{ field }"
                name="sex"
                label="Sex"
                v-model="filterForm.sex"
            >
                <InputLabel for="sex">Sex</InputLabel>
                <InputSelect
                name="sex"
                id="sex"
                v-bind="field"
                :value="field.value"
                >
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                </InputSelect>
            </Field>
            </div>
            <div class="col-span-2">
            <Field
                v-slot="{ field }"
                name="direction"
                label="Direction"
                v-model="filterForm.direction"
            >
                <InputLabel for="direction">Direction</InputLabel>
                <InputSelect
                name="direction"
                id="direction"
                v-bind="field"
                :value="field.value"
                >
                <option value="Ascending">Ascending</option>
                <option value="Descending">Descending</option>
                </InputSelect>
            </Field>
            </div>
            <div class="col-span-2">
            <Field
                v-slot="{ field }"
                name="size"
                label="size"
                v-model="filterForm.size"
            >
                <InputLabel for="size">Size</InputLabel>
                <InputSelect
                name="size"
                id="size"
                v-bind="field"
                :value="field.value"
                >
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">Female</option>
                </InputSelect>
            </Field>
            </div>
            <FilterFooter>
            <ButtonMuted type="reset">Reset</ButtonMuted>
            <ButtonPrimary type="submit">Filter</ButtonPrimary>
            </FilterFooter>
        </Form>
        </Filter>

        <Table>
        <template v-slot:table-header>
            <TableHeader>Name</TableHeader>
            <TableHeader>Job</TableHeader>
            <TableHeader>Address</TableHeader>
            <TableHeader></TableHeader>
        </template>
        <template v-slot:table-body>
            <TableRow v-for="(user, i) in users" :key="i">
            <TableData>
                <div class="flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img
                    class="object-cover w-full h-full rounded-full"
                    :src="`https://randomuser.me/api/portraits/${
                        user.sex === 'Male' ? 'men' : 'women'
                    }/${Math.round(Math.random() * 10)}.jpg`"
                    alt=""
                    loading="lazy"
                    />
                    <div
                    class="absolute inset-0 rounded-full shadow-inner"
                    aria-hidden="true"
                    ></div>
                </div>
                <div>
                    <p class="font-semibold text-gray-800">{{ user.name }}</p>
                    <div class="mt-1">
                    <SexChip :sex="user.sex" />
                    </div>
                </div>
                </div>
            </TableData>
            <TableData>
                <span class="text-sm font-medium text-gray-800">{{
                user.job
                }}</span>
            </TableData>
            <TableData>
                <span class="text-sm font-medium text-gray-800">{{
                user.address
                }}</span>
            </TableData>
            <TableData>
                <div class="flex items-center space-x-4 text-sm">
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Edit"
                >
                    <PencilIcon class="w-5 h-5" />
                </button>
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-400 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                    aria-label="Delete"
                >
                    <TrashIcon class="w-5 h-5" />
                </button>
                </div>
            </TableData>
            </TableRow>
        </template>
        </Table>
    </PageBody>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import PageBody from '@/Components/PageBody.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import Table from '@/Components/Table.vue'
import TableHeader from '@/Components/TableHeader.vue'
import TableRow from '@/Components/TableRow.vue'
import TableData from '@/Components/TableData.vue'
import SexChip from  '@/Components/SexChip.vue'
import InputText from '@/Components/InputText.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputSelect from '@/Components/InputSelect.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import ButtonMuted from '@/Components/ButtonMuted.vue'
import Filter from '@/Components/Filter.vue'
import FilterFooter from '@/Components/FilterFooter.vue'

import { PencilIcon, TrashIcon } from '@heroicons/vue/24/solid'
import { users } from '../../../utils/constants.js'
import { ref } from 'vue'
import { Form, Field } from 'vee-validate'

const isFilterVisible = ref(true)

const filterForm = ref({
    query: '',
    sex: 'All',
    sort_by: 'Name',
    direction: 'Ascending',
    size: 10
})

</script>