// router.js

import { createRouter, createWebHistory } from 'vue-router';

// Import your components
import Home from '../components/frontend/pages/home.vue';

const routes = [
  { path: '/', component: Home, name: 'home' },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
