<template>
    <div>
        <AppHeader></AppHeader>
        <main class="main-wrapper">
              <router-view></router-view>
        </main>
        <AppFooter></AppFooter>
    </div>
</template>
<script>

import AppHeader from '../../../components/frontend/layouts/header.vue';
import AppFooter from '../../../components/frontend/layouts/footers.vue'; // Changed Footer to AppFooter
export default {
  name: 'Main',
  components: {
    AppHeader,
    AppFooter // Changed Footer to AppFooter
  }
}
</script>
