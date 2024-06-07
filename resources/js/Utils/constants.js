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

const filterValues = {
  directions: [
    'ascending',
    'descending'
  ],
  sizes: [10,20,50],
}

const formValues = {
  roles: [
    'admin',
    'user'
  ]
}

export {
  sidebarLinks,
  appName,
  filterValues,
  formValues,
}