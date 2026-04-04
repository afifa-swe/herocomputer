import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Services from './pages/Services.vue';
import Cases from './pages/Cases.vue';
import CaseDetail from './pages/CaseDetail.vue';
import Developers from './pages/Developers.vue';
import Contacts from './pages/Contacts.vue';

const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/about', name: 'about', component: About },
    { path: '/services', name: 'services', component: Services },
    { path: '/cases', name: 'cases', component: Cases },
    { path: '/cases/:id', name: 'case-detail', component: CaseDetail },
    { path: '/developers', name: 'developers', component: Developers },
    { path: '/contacts', name: 'contacts', component: Contacts },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        return { top: 0 };
    },
});

export default router;
