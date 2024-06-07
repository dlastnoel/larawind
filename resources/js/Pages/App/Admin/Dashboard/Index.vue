<template>
    <AuthLayout>
        <PageHeader>
            <h1 class="text-2xl font-medium text-gray-800">
                {{ greet() }}, John Doe!
            </h1>
        </PageHeader>

        <PageBody>

            <div class="w-full grid grid-cols-12 gap-3">

                <CardIcon class="col-span-12 md:col-span-6 lg:col-span-3 self-start" iconBackground="bg-sky-100" iconColor="text-sky-600" :icon="UsersIcon"
                    title="Users" content="921" />

                <CardIcon class="col-span-12 md:col-span-6 lg:col-span-3 self-start" iconBackground="bg-green-100" iconColor="text-green-700" :icon="BanknotesIcon"
                    title="Savings" content="&#8369; 53,685.00" />

                <CardIcon class="col-span-12 md:col-span-6 lg:col-span-3 self-start" iconBackground="bg-red-100" iconColor="text-red-500" :icon="CircleStackIcon"
                    title="Deductions" content="&#8369; 1,234.00" />
                    
                <CardIcon class="col-span-12 md:col-span-6 lg:col-span-3 self-start" iconBackground="bg-yellow-100" iconColor="text-yellow-600" :icon="AdjustmentsHorizontalIcon"
                    title="Accounts" content="&#8369; 3,456.00" />

                
                <Card class="col-span-12 lg:col-span-9" color="bg-gray-50">
                    <div class="flex justify-between items-center">
                        <p class="text-base font-medium text-gray-800">Overview</p>
                        
                        <div class="flex justify-center">
                            <button class="w-20 px-3 py-2 text-sm font-medium bg-white focus:bg-sky-500 focus:text-white transition-all duration-100 rounded-l-lg text-center">Today</button>
                            <button class="w-20 px-3 py-2 text-sm font-medium bg-white focus:bg-sky-500 focus:text-white transition-all duration-100 text-center">Weekly</button>
                            <button class="w-20 px-3 py-2 text-sm font-medium bg-white focus:bg-sky-500 focus:text-white transition-all duration-100 rounded-r-lg text-center">Monthly</button>
                        </div>
                    </div>
                </Card>

                <Card class="col-span-3">
                    <div class="flex justify-between items-center">
                        <p class="text-base font-medium text-gray-800">Activity Log</p>
                        <button class="p-1 rounded-full shadow-sm bg-sky-500 text-white font-medium hover:cursor-pointer hover:bg-sky-600">
                            <ChevronRightIcon class="w-3 h-3" />
                        </button>
                    </div>
                    <ul class="mt-4 flex flex-col space-y-4">

                        <li class="transition-all duration-75 hover:bg-gray-50 hover:cursor-default">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-medium text-gray-800">User created</p>
                                    <p class="text-xs font-medium text-gray-400">John Doe</p>
                                </div>
                                <p class="text-xs font-medium text-gray-400">11:32 am</p>
                            </div>
                            <hr class="mt-1">
                        </li>
                        <li class="transition-all duration-75 hover:bg-gray-50 hover:cursor-default">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-medium text-gray-800">User created</p>
                                    <p class="text-xs font-medium text-gray-400">John Doe</p>
                                </div>
                                <p class="text-xs font-medium text-gray-400">11:32 am</p>
                            </div>
                            <hr class="mt-1">
                        </li>
                        <li class="transition-all duration-75 hover:bg-gray-50 hover:cursor-default">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-medium text-gray-800">User created</p>
                                    <p class="text-xs font-medium text-gray-400">John Doe</p>
                                </div>
                                <p class="text-xs font-medium text-gray-400">11:32 am</p>
                            </div>
                            <hr class="mt-1">
                        </li>
                        <li class="transition-all duration-75 hover:bg-gray-50 hover:cursor-default">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-xs font-medium text-gray-800">User created</p>
                                    <p class="text-xs font-medium text-gray-400">John Doe</p>
                                </div>
                                <p class="text-xs font-medium text-gray-400">11:32 am</p>
                            </div>
                            <hr class="mt-1">
                        </li>

                        
                    </ul>
                </Card>

            </div>
        </PageBody>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import PageHeader from '@/Components/PageHeader.vue'
import PageBody from '@/Components/PageBody.vue'
import Breadcrumbs from '@/Components/Breadcrumbs.vue'
import ButtonPrimary from '@/Components/ButtonPrimary.vue'
import CardIcon from '@/Components/CardIcon.vue'
import Card from '@/Components/Card.vue'

import { 
    UsersIcon, BanknotesIcon, CircleStackIcon,
    AdjustmentsHorizontalIcon,
} from '@heroicons/vue/24/solid'
import { ChevronRightIcon } from '@heroicons/vue/16/solid'

import moment from 'moment'
import { greet } from '@/Helpers/dateTimeHelpers'

</script>