<template>
  <div class="promotion-component" :style="{ backgroundColor: promotion.color }">
    <div class="promotion-content">
      <h2>{{ promotion.title }}</h2>
      <ButtonComponent :promotion="promotion" />
    </div>
    <div class="promotion-image">
      <img :src="promotion.img" alt="Promotion Image" />
    </div>
  </div>
</template>
<script lang="ts">
import ButtonComponent from './buttonComponent.vue'
export default {
  components: {
    ButtonComponent,
  },
  name: 'PromotionComponent',
  props: {
    promotion: {
      type: Object,
      required: true,
    },
  },
}
</script>
<style scoped>
.promotion-component {
  width: 560px;
  height: 230px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 30px;
  padding-right: 0;
  border-radius: 10px;
}
.promotion-content {
  max-width: 40%;
  padding-left: 30px;
}
.promotion-content h2 {
  font-size: 20px;
  font-family: 'Quicksand', sans-serif;
}
.promotion-image img {
  padding-top: 50px;
}
</style>
