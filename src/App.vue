<!-- <template>
  <div class="card_container">
      <div class="card_container">
    <CategoryComponent
      v-for="item in categories"
      :key="item.id"
      :name="item.name"
      :productCount="item.productCount"
      :image="`http://localhost:3000/${item.image}`"
      :color="item.color"
    />
  </div>
  </div>
  <div class="card_promotion">
    <PromotionComponent
      v-for="item in promotions"
      :key="item.title"
      :title="item.title"
      :image="`http://localhost:3000/${item.image}`"
      :color="item.color"
      :buttonColor="item.buttonColor"
      :hoverColor="item.hoverColor"
      :promotion="item"
    />
  </div>
</template>
<script lang="ts">
//import axios from 'axios'
import { onMounted } from 'vue';
import { useProductStore } from './stores/product'
import CategoryComponent from './components/CategoryComponent.vue'
import PromotionComponent from './components/PromotionComponent.vue'

const productStore = useProductStore()
export default {
  name: 'App',
  components: {
    CategoryComponent,
    PromotionComponent,
  },
  data() {
    return {
      categories: [],
      promotions: [],
    }
  },
  methods: {
    // Fetch categories from backend
    fetchCategories() {
      axios
        .get('http://localhost:3000/api/categories')
        .then((response) => {
          this.categories = response.data
        })
        .catch((error) => {
          console.error('Error fetching categories:', error)
        })
    },
    // Fetch promotions from backend
    fetchPromotions() {
      axios
        .get('http://localhost:3000/api/promotions')
        .then((response) => {
          this.promotions = response.data
        })
        .catch((error) => {
          console.error('Error fetching promotions:', error)
        })
    },
  },
  mounted() {
    // fetch data when component loads
    this.fetchCategories()
    this.fetchPromotions()
  },
  onMounted(() => {
  productStore.fetchAll()
})
}
</script>

<style scoped>
.card_container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
}
.card_promotion {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 17px;
  padding: 20px;
}
</style> -->
<template>
  <div class="card_container">
    <CategoryComponent
      v-for="item in productStore.categories"
      :key="item.id"
      :name="item.name"
      :productCount="item.productCount"
      :image="`http://localhost:3000/${item.image}`"
      :color="item.color"
    />
  </div>

  <div class="card_promotion">
    <PromotionComponent
      v-for="item in productStore.promotions"
      :key="item.id"
      :title="item.title"
      :image="`http://localhost:3000/${item.image}`"
      :color="item.color"
      :buttonColor="item.buttonColor"
      :hoverColor="item.hoverColor"
      :promotion="item"
    />
  </div>
  <ProductsComponent />
</template>

<script lang="ts">
import { onMounted } from 'vue'
import { useProductStore } from './stores/product'

import CategoryComponent from './components/CategoryComponent.vue'
import PromotionComponent from './components/PromotionComponent.vue'
import ProductsComponent from './components/ProductComponent.vue'

// const productStore = useProductStore()

// onMounted(() => {
//   productStore.fetchAll()
// })
export default {
  name: 'App',
  components: { CategoryComponent, PromotionComponent, ProductsComponent },
  setup() {
    const productStore = useProductStore()
    productStore.fetchAll() // fetch categories, promotions, products, groups

    return { productStore }
  },
}
</script>

<style scoped>
.card_container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 10px;
}

.card_promotion {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 17px;
  padding: 20px;
}
</style>
