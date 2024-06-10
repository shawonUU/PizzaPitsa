<template>
    <div>
        <AppHeader  @openCartModal="handleCartModal"></AppHeader>
         <Cart></Cart>
        <main class="main-wrapper">
              <router-view></router-view>
        </main>
        <AppFooter></AppFooter>
    </div>
</template>
<script>

import AppHeader from '../../../components/frontend/layouts/header.vue';
import AppFooter from '../../../components/frontend/layouts/footers.vue'; // Changed Footer to AppFooter
import Cart from '../pages/modal/cart.vue';
export default {
  name: 'Main',
  components: {
    AppHeader,
    AppFooter,
    Cart
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
