<template>
  <button 
    class="custom-btn"
    :style="{ backgroundColor: currentColor }"
    @mouseenter="currentColor = hoverColor"
    @mouseleave="currentColor = bgColor"
  >
    Shop Now →
  </button>
</template>
<script lang="ts">
export default {
  name: 'ButtonComponent',
  props: {
    bgColor: String,
    hoverColor: String,
    promotion: Object
  },
  data() {
    return {
      currentColor: this.bgColor,
    }
  },
}
</script>

<style scoped>
.custom-btn {
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  font-family: Quicksand, sans-serif;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.2s ease;
}
</style>
