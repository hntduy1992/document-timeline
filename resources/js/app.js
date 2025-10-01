import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import './bootstrap';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import {resolvePageComponent} from "laravel-vite-plugin/inertia-helpers";

//Vite::asset('resources/images/logo.png') }}
import.meta.glob([
    '../images/**',
]);


// Vuetify
// Vuetify
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
const vuetify = createVuetify({
    components,
    directives,
})

// Toast
import 'vue3-toastify/dist/index.css';

createInertiaApp({
    resolve: name => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        );
        page.then((module) => {
            module.default.layout = module.default.layout || DefaultLayout;
        });
        return page;
    },
    setup({el, App, props, plugin}) {
        createApp({render: () => h(App, props)})
            .use(plugin)
            .use(vuetify)
            .mount(el)
    },
});
