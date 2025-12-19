<template>
  <div class="product_card" :style="{ backgroundColor: color }">
    <img v-if="image" :src="image" alt="product_image" class="image_product" />
    <h3 class="product_title">{{ name }}</h3>
    <p class="product_amout">{{ productCount }}</p>
  </div>
</template>
<script lang="ts">
export default {
  name: 'CategoryComponent',
  props: {
    name: String,
    productCount: {
      type: [String, Number],
      required: true,
  },
    image: String,
    color: String,
  },
}
</script>
<style scoped>
.product_card {
  width: 120px;
  height: 162px;
  border: 1px solid #e0e0e0;
  border-radius: 10px;
  text-align: center;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.image_product {
  width: 110px;
  height: 110px;
  margin-top: 5px;
}
.product_title {
  font-size: 14px;
  font-family: Quicksand, sans-serif;
  color: #253d4e;
  margin: 0;
}
.product_amout {
  font-size: 12px;
  font-family: Lato, sans-serif;
  color: #b6b6b6;
  margin: 0;
}
</style>
