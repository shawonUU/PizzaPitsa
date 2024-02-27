// router.js

import { createRouter, createWebHistory } from 'vue-router';

// Import your components
import Home from '../components/frontend/pages/home.vue';
import Dashboard from '../components/frontend/pages/dashboard.vue';

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/dashboard', component: Dashboard, name: 'dashboard' },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
