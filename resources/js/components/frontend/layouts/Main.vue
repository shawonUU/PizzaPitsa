<template>
    <div>
        <AppHeader  @openCartModal="handleCartModal"></AppHeader>
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
  },
  mounted(){

    },
  methods: {
    handleCartModal() {
      // Add your logic here to affect home.vue or perform any necessary action
      console.log('Cart modal opened from header.vue');
    }
  }
}
</script>
