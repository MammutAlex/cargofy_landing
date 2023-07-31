import './bootstrap';
import '../scss/app.scss';

import {createApp, h} from 'vue';
import {Quasar} from 'quasar'
import {createI18n} from 'vue-i18n'
import {createInertiaApp} from '@inertiajs/vue3';
import vClickOutside from "click-outside-vue3";
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {ZiggyVue} from '../../vendor/tightenco/ziggy/dist/vue.m';
import enUS from '@/lang/en-US'
import uk from '@/lang/uk'
import quasarUk from 'quasar/lang/uk'
import quasarDefault from 'quasar/lang/en-GB'

function quasarLang(lang) {
    switch (lang) {
        case 'uk':
            return quasarUk
        case 'en':
        default:
            return quasarDefault
    }
}

createInertiaApp({
    title: (title) => `${title} - cargofy`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({el, App, props, plugin}) {
        return createApp({render: () => h(App, props)})
            .use(plugin)
            .use(Quasar, {
                lang: quasarLang(document.querySelector('html').getAttribute('lang')),
                sassVariables: "../scss/quasar-variables.sass",
                plugins: {},
            })
            .use(createI18n({
                locale: document.querySelector('html').getAttribute('lang'),
                fallbackLocale: 'en-US',
                legacy: false,
                messages: {
                    en: enUS,
                    uk: uk,
                }
            }))
            .use(vClickOutside)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#F97316',
    },
});
