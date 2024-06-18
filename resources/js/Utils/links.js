import { Squares2X2Icon, UsersIcon } from '@heroicons/vue/24/outline'
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'


export const sidebarLinks = computed(() => {
    return [
        {
            name: 'Dashboard',
            svg: Squares2X2Icon,
            href: '#'
        },
        {
            name: 'Users',
            svg: UsersIcon,
            href: route('users.index'),
            active: [
                'App/Users/Index',
                'App/Users/Create',
                'App/Users/Edit',
            ].includes(usePage().component)
        },
    ]
})