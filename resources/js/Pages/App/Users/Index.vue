<template>
    <AuthLayout>
        <PageHeader>
            <Breadcrumbs
            :items="[
                {
                name: 'Users',
                href: '#',
                },
            ]"
            />
            <Link :href="route('users.create')">
                <ButtonPrimary>Create</ButtonPrimary>
            </Link>
        </PageHeader>
        <PageBody>
            <Filter>
                <Form @submit="handleFilter()"
                    class="grid grid-cols-12 gap-2">
                    <div class="col-span-4">
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
                            name="status"
                            label="Status"
                            v-model="filterForm.status"
                        >
                            <InputLabel for="status">Status</InputLabel>
                            <InputSelect
                            name="status"
                            id="status"
                            v-bind="field"
                            :value="field.value"
                            >
                                <option value="all" class="capitalize">All</option>
                                <option value="active" class="capitalize">Active</option>
                                <option value="deactivated" class="capitalize">Deactivated</option>
                                <option value="terminated" class="capitalize">Terminated</option>
                            </InputSelect>
                        </Field>
                    </div>
                    <div class="col-span-2">
                        <Field
                            v-slot="{ field }"
                            name="sort_by"
                            label="Sort by"
                            v-model="filterForm.sort_by"
                        >
                            <InputLabel for="sort_by">Sort By</InputLabel>
                            <InputSelect
                            class="capitalize"
                            name="sort_by"
                            id="sort_by"
                            v-bind="field"
                            :value="field.value"
                            >
                                <option value="first name">first Name</option>
                                <option value="last name">last Name</option>
                                <option value="status">status</option>
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
                            class="capitalize"
                            name="direction"
                            id="direction"
                            v-bind="field"
                            :value="field.value"
                        >
                        <option v-for="(direction, i) in filterOptions.directions" :key="i"
                            :value="direction" >{{ direction }}</option>
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
                        <option value="50">50</option>
                        </InputSelect>
                    </Field>
                    </div>
                    <FilterFooter>
                    <ButtonMuted @click="handleResetFilter()">Reset</ButtonMuted>
                    <ButtonPrimary type="submit">Filter</ButtonPrimary>
                    </FilterFooter>
                </Form>
            </Filter>

            <Table>
                <template v-slot:header>
                    <TableHeader>Name</TableHeader>
                    <TableHeader>Role</TableHeader>
                    <TableHeader>Status</TableHeader>
                    <TableHeader></TableHeader>
                </template>

                <template v-slot:body>
                    <TableRow v-for="(user, i) in users.data" :key="i">
                        <TableData>
                            <span class="text-sm font-medium text-gray-800">{{ displayName(user) }}</span>
                        </TableData>
                        <TableData>
                            <span class="text-sm font-medium text-gray-800">{{ user.role.name }}</span>
                        </TableData>
                        <TableData>
                            <span class="text-sm font-medium text-gray-800">
                                <StatusChip :status="user.status" />
                            </span>
                        </TableData>
                        <TableData>
                            <div class="flex items-center space-x-4 text-sm">
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-sky-500 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Edit"
                                >
                                    <PencilIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </TableData>
                    </TableRow>
                </template>

                <template v-slot:footer>
                    <Pagination :meta="users.meta" :only="['users']" />
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
import Pagination from '@/Components/Pagination.vue'
import StatusChip from  '@/Components/StatusChip.vue'
import InputText from '@/Components/InputText.vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputSelect from '@/Components/InputSelect.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import ButtonMuted from '@/Components/ButtonMuted.vue'
import Filter from '@/Components/Filter.vue'
import FilterFooter from '@/Components/FilterFooter.vue'

import { PencilIcon, TrashIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue'
import { displayName } from '@/Helpers/displayHelpers'
import { Form, Field } from 'vee-validate'
import { filterValues } from '@/Utils/constants'
import { useForm } from '@inertiajs/vue3'

// props
const props = defineProps({
    users: Object,
    filters: Object
})


// data
const isFilterVisible = ref(true)

const filterForm = useForm({
    query: '',
    status: props.filters.status ?? 'all',
    sort_by: props.filters.sort_by ?? 'first name',
    direction: props.filters.direction ?? 'ascending',
    size: props.filters.size ?? 10
})

const filterOptions = {
    directions: filterValues.directions,
    sizes: filterValues.sizes,
}


// methods
function handleFilter() {
    filterForm.get(route('users.index'), {

        preserveState: true,
        preserveScroll: true,
        only: ['users']
    })
}

function handleResetFilter() {
    filterForm.query = ''
    filterForm.status = 'all'
    filterForm.sort_by = 'first name'
    filterForm.direction = 'ascending'
    filterForm.size = 10

    handleFilter()
}


</script>