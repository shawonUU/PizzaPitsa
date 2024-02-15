<template>
    <div>
        <Header></Header>
        <main class="main-wrapper">
              <router-view></router-view>
        </main>
        <Footer></Footer>
    </div>
</template>
<script>

import Header from '../../../components/frontend/layouts/header.vue';
import Footer from '../../../components/frontend/layouts/footers.vue';
export default {
  name: 'Main',
  components:{Header, Footer}
}
</script>