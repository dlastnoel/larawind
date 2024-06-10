import { Squares2X2Icon, UsersIcon } from '@heroicons/vue/24/outline'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const sidebarLinks = [
  {
    name: 'Dashboard',
    svg: Squares2X2Icon,
  },
  {
    name: 'Users',
    svg: UsersIcon,
  },
]

export {
  sidebarLinks,
  appName,
}