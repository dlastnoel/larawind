import { Squares2X2Icon, UsersIcon } from '@heroicons/vue/24/outline'

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

const users = [
  {
    name: 'John Doe',
    job: 'Fullstack Web Developer',
    address: 'Baguio City',
    sex: 'Male'
  },
  {
    name: 'Jackie Chan',
    job: 'General Surgeon',
    address: 'La Trinidad, Benguet',
    sex: 'Male'
  },
  {
    name: 'Britney Spears',
    job: 'Dentist',
    address: 'City of San Fernando, La Union',
    sex: 'Female'
  },
  {
    name: 'Mariah Carey',
    job: 'Head Nurse',
    address: 'Cauayan, Isabela',
    sex: 'Female',
  },
  {
    name: 'George Bush',
    job: 'Anesthesiologist',
    address: 'Batac, Ilocos Norte',
    sex: 'Male',
  },
  {
    name: 'Taylor Swift',
    job: 'Midwife',
    address: 'Rosales, Pangasinan',
    sex: 'Female'
  },
  {
    name: 'Steve Harvey',
    job: 'Ambulance Driver',
    address: 'Vigan City, Ilocos Sur',
    sex: 'Male'
  },
  {
    name: 'Alice Gou',
    job: 'Neurosurgeon',
    address: 'Bamban, Tarlac',
    sex: 'Female'
  },
  {
    name: 'Raffy Tulfo',
    job: 'Cardiothoracic Surgeon',
    address: 'Sta. Maria, Bulacan',
    sex: 'Male'
  },
  {
    name: 'Sabriana Ionescu',
    job: 'Oncologist',
    address: 'Angeles City, Pampanga',
    sex: 'Female'
  },
]

export {
  sidebarLinks,
  users
}

export default sidebarLinks