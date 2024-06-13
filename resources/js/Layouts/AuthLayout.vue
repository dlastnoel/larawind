<template>
  <div class="flex h-screen bg-gray-50">
    <!-- sidebar desktop -->
    <SidebarDesktop :sidebarLinks="sidebarLinks" />

    <!-- sidebar mobile -->
    <SidebarMobile
      :sidebarLinks="sidebarLinks"
      v-if="isSidebarForMobileVisible"
      v-on-click-outside="autoCloseSidebarMobile"
    />

    <div class="flex flex-col flex-1 w-full">
      <!-- headers -->
      <header class="z-10 py-4 bg-white shadow">
        <div
          class="flex items-center justify-between h-full px-3 text-sky-500"
        >
          <!-- mobile sidebar hamburger -->
          <button
            @click="isSidebarForMobileVisible = !isSidebarForMobileVisible"
            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
          >
            <Bars3Icon class="w-6 h-6" />
          </button>
          <div class="flex justify-center flex-1 lg:mr-32">
            <div
              class="relative w-full max-w-xl mr-6 focus-within:text-sky-500"
            ></div>
          </div>

          <!-- {{ isProfileDropdownVisible }} -->

          <!-- user info -->
          <ul class="flex items-center flex-shrink-0 space-x-6">
            <li class="relative">
              <button ref="refBtnProfile"
                class="flex justify-center items-center gap-2 hover:cursor-auto" 
                @click="isProfileDropdownVisible = !isProfileDropdownVisible">
                <UserCircleIcon class="w-5 h-5 text-gray-500 hover:text-gray-800 hover:cursor-pointer transition-all duration-100" />
                <span class="text-base text-gray-800 font-semibold">
                  {{ displayName($page.props.auth.user.data) }}
                </span>
              </button>
              <ul v-if="isProfileDropdownVisible"
                v-on-click-outside="autoCloseProfileDropdown"
                class="absolute top-6 right-20 p-3 bg-white rounded shadow w-56">

                <Link :href="route('user-profile.edit')">
                  <li class="w-full rounded-lg p-3 flex justify-start items-center gap-2 text-gray-800 transition-all duration-100 hover:cursor-pointer hover:bg-gray-100">
                    <UserIcon class="w-4 h-4" />
                    <span class="text-sm font-medium">Profile</span>
                  </li>
                </Link>
                <li class="w-full rounded-lg p-3 flex justify-start items-center gap-2 text-gray-800 transition-all duration-100 hover:cursor-pointer hover:bg-gray-100">
                  <Cog6ToothIcon class="w-4 h-4" />
                  <span class="text-sm font-medium">Settings</span>
                </li>
                <li @click.prevent="handleLogout()"
                  class="w-full rounded-lg p-3 flex justify-start items-center gap-2 text-gray-800 transition-all duration-100 hover:cursor-pointer hover:bg-gray-100">
                  <ArrowLeftEndOnRectangleIcon class="w-4 h-4" />
                  <span class="text-sm font-medium">Logout</span>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </header>

      <!-- main -->
      <main class="h-full overflow-y-auto pb-10 bg-gray-50">
        <div class="px-14 py-8">
          <slot />
        </div>
      </main>
    </div>
  </div>
</template>

<script setup>
import SidebarMobile from '@/Components/SidebarMobile.vue'
import SidebarDesktop from '@/Components/SidebarDesktop.vue'

import { Bars3Icon, UserCircleIcon } from '@heroicons/vue/24/solid'
import { UserIcon, Cog6ToothIcon, ArrowLeftEndOnRectangleIcon } from '@heroicons/vue/24/outline'

import { sidebarLinks } from '@/Utils/constants'
import { vOnClickOutside } from '@vueuse/components'
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { displayName } from '@/Helpers/displayHelpers'

// data
const refBtnProfile = ref(null)

const isSidebarForMobileVisible = ref(false)
const isProfileDropdownVisible = ref(false) 

const form = useForm({})

// methods
function autoCloseProfileDropdown() {
  isProfileDropdownVisible.value = false
}

function autoCloseSidebarMobile() {
  isSidebarForMobileVisible.value = false
}

function handleLogout() {

  form.delete(route('auth.destroy'))
}

</script>

<style>
</style>