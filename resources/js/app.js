import { createApp } from 'vue';
import router from './router';
import mitt from 'mitt';
import app from './components/app.vue';

const emitter = mitt();

const vueApp = createApp(app);

// Add emitter as a property on the Vue prototype
vueApp.config.globalProperties.emitter = emitter;

vueApp.use(router).mount('#app');
