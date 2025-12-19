<template>
  <div class="promotion_card" :style="{ backgroundColor: color }">
    <div class="content">
      <p>{{ title }}</p>
      <ButtonComponent
        :bgColor="buttonColor"
        :hoverColor="hoverColor"
        @click="shopNow(promotion)"
      />
    </div>
    <div class="image_promotion">
      <img v-if="image" :src="image" alt="promotion_image" />
    </div>
  </div>
</template>

<script lang="ts">
import ButtonComponent from './ButtonComponent.vue'
export default {
  components: {
    ButtonComponent,
  },
  name: 'PromotionComponent',
  props: {
    title: String,
    image: String,
    color: String,
    buttonColor: String,
    hoverColor: {
      type: String,
      default: '#3BB77E', // optional
    },
    promotion: Object,
  },
  methods: {
    shopNow(promotion: any) {
      alert("Let's shop: " + promotion.title)
    },
  },
}
</script>
<style scoped>
.promotion_card {
  width: 430px;
  height: 200px;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  padding: 30px;
  padding-right: 0;
  border-radius: 10px;
}
.image_promotion img {
  height: 240px;
  max-width: 65%;
  object-fit: contain;
  padding-top: 100px;
  padding-left: 40px;
}
.content {
  max-width: 40%;
}
.content p {
  font-size: 24px;
  font-family: Quicksand, sans-serif;
  font-weight: 700;
  color: #253d4e;
}
</style>
