<template>
  <div class="category-component" :style="{ backgroundColor: category.color }">
    <img :src="category.img" :alt="category.name" class="category-image" />
    <div class="category-info">
      <h3>{{ category.name }}</h3>
      <p>{{ category.productCount }} items</p>
    </div>
  </div>
</template>
<script lang="ts">
export default {
  name: 'CategoryComponent',
  props: {
    category: {
      type: Object,
      required: true,
    },
  },
}
</script>
<style scoped>
.category-component {
  width: 110px;
  height: 100px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  transition: transform 0.2s;
}

.category-component:hover {
  transform: translateY(-5px);
}

.category-image {
  width: 80px;
  height: 80px;
  object-fit: contain;
  /* margin-bottom: 10px; */
}

.category-info {
  text-align: center;
}

.category-info h3 {
  font-size: 14px;
  font-family: Lato, sans-serif;
  margin: 0 0 5px 0;
}

.category-info p {
  font-size: 12px;
  font-family: Quicksand, sans-serif;
  color: #b6b6b6;
  margin: 0;
}
</style>
