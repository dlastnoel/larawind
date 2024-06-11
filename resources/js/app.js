import './bootstrap'
import '../css/app.css'
import '../css/poppins.css'
import 'notyf/notyf.min.css'

import { createApp, h } from 'vue';
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

import './Plugins/vee-validate'
import { appName } from './Utils/constants'


createInertiaApp({
    title: (title) => `${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            
            .component('Link', Link)
            .component('Head', Head)
            
            .mount(el);
    },
    progress: {
        color: '#0ea5e9',
        showSpinner: true,
    },
});
