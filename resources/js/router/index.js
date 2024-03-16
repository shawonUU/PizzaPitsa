import { createRouter, createWebHistory } from 'vue-router';
import Home from '../components/frontend/pages/home.vue';
import Dashboard from '../components/frontend/pages/dashboard.vue';
import About from '../components/frontend/pages/about.vue';
import Contact from '../components/frontend/pages/contact.vue';

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/about', component: About, name: 'about' },
  { path: '/contact', component: Contact, name: 'contact' },
  { path: '/dashboard', component: Dashboard, name: 'dashboard', meta: { requiresAuth: true } },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// Navigation guard for checking authentication
router.beforeEach((to, from, next) => {
  const isAuthenticated = localStorage.getItem('auth') !== null; // Check if auth data exists in localStorage
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

  if (requiresAuth && !isAuthenticated) {
    // If the route requires authentication and the user is not authenticated, redirect to the login page or any other route
    next({ name: 'home' }); // Replace 'login' with your actual login route
  } else {
    // Otherwise, proceed with the navigation
    next();
  }
});

export default router;
