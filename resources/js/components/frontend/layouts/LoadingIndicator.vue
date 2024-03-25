<template>
  <div v-if="loading" class="loading-indicator">
    <!-- Your loading indicator content, e.g., spinner, loading text, etc. -->
    Loading...
  </div>
</template>

<script>
export default {
  name: 'LoadingIndicator',
  props: {
    loading: {
      type: Boolean,
      required: true
    }
  }
}
</script>

<style scoped>
.loading-indicator {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 4px; /* Height of loading bar */
  background-color: #007bff; /* Loading bar color */
  z-index: 9999; /* Make sure it's on top of other content */
}
</style>
