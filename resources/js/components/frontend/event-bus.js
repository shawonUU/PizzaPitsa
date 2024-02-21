// event-bus.js
import { ref, onMounted } from 'vue';

const eventBus = ref(null);

onMounted(() => {
  eventBus.value = app;
});

export default eventBus;
