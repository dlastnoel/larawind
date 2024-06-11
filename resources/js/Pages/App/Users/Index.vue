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
                <Form @submit="handleFilter"
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
                    <div class="col-span-4">
                        <Field
                            v-slot="{ field }"
                            name="status"
                            label="Status"
                            v-model="filterForm.status"
                        >
                            <InputLabel for="status">Status</InputLabel>
                            <InputSelect class="capitalize"
                            name="status"
                            id="status"
                            v-bind="field"
                            :value="field.value"
                            >
                                <option v-for="(status, i) in filterOptions.statuses" :key="i"
                                    :value="status">
                                    {{ status}}
                                </option>
                            </InputSelect>
                        </Field>
                    </div>
                    <div class="col-span-4">
                        <Field
                            v-slot="{ field }"
                            name="role"
                            label="Role"
                            v-model="filterForm.role"
                        >
                            <InputLabel for="role">Role</InputLabel>
                            <InputSelect class="capitalize"
                            name="role"
                            id="role"
                            v-bind="field"
                            :value="field.value"
                            >
                                <option v-for="(role, i) in filterOptions.roles" :key="i"
                                    :value="role">
                                    {{ role }}
                                </option>
                            </InputSelect>
                        </Field>
                    </div>
                    <div class="col-span-4">
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
                                <option value="first name">First Name</option>
                                <option value="last name">Last Name</option>
                                <option value="status">Status</option>
                            </InputSelect>
                        </Field>
                    </div>
                    <div class="col-span-4">
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
                    <div class="col-span-4">
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
                        <ButtonMuted type="reset" @click.prevent="handleResetFilter()">Reset</ButtonMuted>
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
                                <StatusChip @click="setStatus(user)"
                                    :status="user.status" />
                            </span>
                        </TableData>
                        <TableData>
                            <div class="flex items-center space-x-4 text-sm">
                                <Link :href="route('users.edit', { user: user.id })">
                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-sky-500 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                    >
                                        <PencilIcon class="w-5 h-5" />
                                    </button>
                                </Link>
                            </div>
                        </TableData>
                    </TableRow>
                </template>

                <template v-slot:footer>
                    <Pagination :meta="users.meta" :only="['users']" />
                </template>
            </Table>

            <Modal v-model="isModalVisible">
                <template v-slot:title>
                    <p class="text-center text-lg font-semibold text-gray-800">
                        {{ displayName(selectedUser) }}
                    </p>
                </template>
                <template v-slot:body>
                    <div>
                        <InputLabel for="status">Status</InputLabel>
                        <Field v-slot="{ field, errorMessage}"
                            name="status"
                            label="Status"
                            v-model="userStatusForm.status">

                            <InputSelect class="capitalize"
                                v-bind="field"
                                name="status"
                                :value="field.value">
                                
                                <option v-for="(status, i) in statuses" :key="i"
                                    :value="status">
                                    {{ status }}
                                </option>
                            </InputSelect>

                            <InputError :message="errorMessage" />
                        </Field>
                    </div>
                </template>
                <template v-slot:footer>
                    <ButtonMuted @click="resetStatus()">Cancel</ButtonMuted>
                    <ButtonPrimary @click="handleSubmit()">Update</ButtonPrimary>
                </template>
            </Modal>

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
import Modal from '@/Components/Modal.vue'

import { PencilIcon, TrashIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue'
import { displayName } from '@/Helpers/displayHelpers'
import { Form, Field } from 'vee-validate'
import { filterRoles, filterStatuses, filterSizes, filterDirections, } from '@/Utils/filters'
import { useForm } from '@inertiajs/vue3'
import useNotyf from '@/Composables/useNotyf'
import { statuses } from '@/Utils/forms'

// props
const props = defineProps({
    errors: Object,
    users: Object,
    filters: Object,
})


// data
const filterForm = useForm({
    query: '',
    status: props.filters.status ?? 'all',
    role: props.filters.role ?? 'all',
    sort_by: props.filters.sort_by ?? 'first name',
    direction: props.filters.direction ?? 'ascending',
    size: props.filters.size ?? 10
})

const filterOptions = {
    directions: filterDirections,
    sizes: filterSizes,
    statuses: filterStatuses,
    roles: filterRoles
}

const isModalVisible = ref(false)
const selectedUser = ref({})
const userStatusForm = useForm({
    status: '',
})


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
    filterForm.role = 'all'
    filterForm.sort_by = 'first name'
    filterForm.direction = 'ascending'
    filterForm.size = 10

    handleFilter()
}

function setStatus(user) {

    if(user.status === 'terminated') {
        useNotyf('error', 'Not allowed.')
        return
    }

    selectedUser.value = user
    userStatusForm.user = user.id
    userStatusForm.status = user.status
    isModalVisible.value = true
}

function resetStatus() {

    isModalVisible.value = false
    selectedUser.value = {}
    userStatusForm.user = ''
    userStatusForm.status = ''
}

function handleSubmit() {

    userStatusForm.put(route('users-status.update', { user: selectedUser.value.id }), {

        preserveState: true,
        preserveScroll: true,
        only: ['users'],

        onError: (errors) => {

        },

        onSuccess: () => {

            useNotyf('info')
            resetStatus()
        }
    })
}


</script>