<template>
  <button class="custom-button" :style="{ backgroundColor: promotion.btnColor }">
    <div class="button-content">
      <p>Shop Now</p>
      <span>→</span>
    </div>
  </button>
</template>
<script lang="ts">
export default {
  name: 'ButtonComponent',
  props: {
    promotion: {
      type: Object,
      required: true,
    },
  },
}
</script>
<style scoped>
.custom-button {
  width: 110px;
  height: 40px;
  font-weight: 600;
  padding: 5px 20px;
  border: none;
  border-radius: 5px;
  color: #fff;
  font-family: 'Quicksand', sans-serif;
  font-size: 12px;
  cursor: pointer;
  transition: background-color 0.3s;
}
.custom-button:hover {
  background-color: #555;
}
.button-content {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.button-content p {
  margin: 0;
}
.button-content span {
  font-size: 10px;
}
</style>
