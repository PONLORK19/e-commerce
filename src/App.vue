<template>
  <div class="">
    <div class="categories-grid">
      <CategoryComponent v-for="category in categories" :key="category.name" :category="category" />
    </div>
    <div class="promotion-grid">
      <PromotionComponent
        v-for="promotion in promotions"
        :key="promotion.title"
        :promotion="promotion"
      />
    </div>
  </div>
</template>
<script lang="ts">
import CategoryComponent from './components/categoryComponent.vue'
import PromotionComponent from './components/promotionComponent.vue'
import axios from 'axios'

export default {
  components: {
    CategoryComponent,
    PromotionComponent,
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await axios.get('http://localhost:3000/api/categories')

        this.categories = response.data
        console.log('Categories fetched:', response.data)
      } catch (error) {
        console.error('Error fetching categories:', error)
      }
    },
    async fetchPromotions() {
      try {
        const response = await axios.get('http://localhost:3000/api/promotions')

        this.promotions = response.data
        console.log('Promotions fetched:', response.data)
      } catch (error) {
        console.error('Error fetching promotions:', error)
      }
    },
  },
  mounted() {
    // Add this mounted hook
    // Fetch data when the component is mounted (loaded)
    this.fetchCategories()
    this.fetchPromotions()
  },
  data() {
    return {
      categories: [
        // {
        //   name: 'Cake & Milk',
        //   productCount: 14,
        //   color: '#F2FCE4',
        //   img: 'src/assets/images/Cake&Milk.png',
        // },
        // {
        //   name: 'Peach',
        //   productCount: 17,
        //   color: '#FFFCEB',
        //   img: 'src/assets/images/Peach.png',
        // },
        // {
        //   name: 'Oganic Kiwi',
        //   productCount: 21,
        //   color: '#ECFFEC',
        //   img: 'src/assets/images/kiwi.png',
        // },
        // {
        //   name: 'Red Apple',
        //   productCount: 68,
        //   color: '#FEEFEA',
        //   img: 'src/assets/images/Red_apple.png',
        // },
        // {
        //   name: 'Snack',
        //   productCount: 34,
        //   color: '#FFF3EB',
        //   img: 'src/assets/images/Snack.png',
        // },
        // {
        //   name: 'Black Plum',
        //   productCount: 25,
        //   color: '#FFF3FF',
        //   img: 'src/assets/images/Black Plum.png',
        // },
        // {
        //   name: 'Vegetable',
        //   productCount: 65,
        //   color: '#F2FCE4',
        //   img: 'src/assets/images/Vegetable.png',
        // },
        // {
        //   name: 'Headphone',
        //   productCount: 33,
        //   color: '#FFFCEB',
        //   img: 'src/assets/images/Headphone.png',
        // },
        // {
        //   name: 'Cafe & Milk',
        //   productCount: 54,
        //   color: '#F2FCE4',
        //   img: 'src/assets/images/Cafe&Milk.png',
        // },
        // {
        //   name: 'Orange',
        //   productCount: 63,
        //   color: '#FFF3FF',
        //   img: 'src/assets/images/Orange.png',
        // },
      ],
      promotions: [
        // {
        //   title: 'Everyday Fresh & Clean with Our Products',
        //   btnColor: '#3BB77E',
        //   color: '#F0E9D7',
        //   img: 'src/assets/images/Onion.png',
        //   buttonColor: '#42B678',
        //   url: '/promotions/1',
        // },
        // {
        //   title: 'Make your Breakfast Healthy and Easy',
        //   btnColor: '#3BB77E',
        //   color: '#F2E8E9',
        //   img: 'src/assets/images/Cake&Milk Promotion.png',
        //   buttonColor: '#42B678',
        //   url: '/promotions/2',
        // },
        // {
        //   title: 'The best Organic Products Online',
        //   btnColor: '#FDC040',
        //   color: '#E6EAF3',
        //   img: 'src/assets/images/Organic.png',
        //   buttonColor: '#FBC040',
        //   url: '/promotions/3',
        // },
      ],
    }
  },
}
</script>
<style scoped>
.categories-grid {
  display: flex;
  justify-content: center;
  gap: 20px;
  padding: 20px;
}
.promotion-grid {
  display: flex;
  justify-content: center;
  gap: 20px;
  padding: 20px;
}
</style>
