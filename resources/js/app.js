import '../css/app.css';
import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import router from './router.js';
import App from './App.vue';
import en from './i18n/en.js';
import ru from './i18n/ru.js';
import az from './i18n/az.js';

const i18n = createI18n({
    legacy: false,
    locale: 'ru',
    fallbackLocale: 'en',
    messages: { en, ru, az },
});

const app = createApp(App);
app.use(router);
app.use(i18n);
app.mount('#app');
