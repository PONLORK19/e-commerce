<template>
  <div>
    <!-- Category Tabs -->
    <MenuComponent
      title="Featured Categories"
      :tabs="categoryTabs"
      :activeTab="activeCategoryTab"
      @tab-change="handleCategoryTabChange"
    />

    <div class="categories-grid">
      <CategoryComponent
        v-for="category in displayedCategories"
        :key="category.id"
        :category="category"
      />
    </div>

    <div class="promotion-grid">
      <PromotionComponent
        v-for="promotion in promotions"
        :key="promotion.id"
        :promotion="promotion"
      />
    </div>

    <!-- Popular Products -->
    <MenuComponent
      title="Popular Products"
      :tabs="productTabs"
      :activeTab="activeProductTab"
      @tab-change="handleProductTabChange"
    />

    <div class="product-grid">
      <ProductComponent
        v-for="product in displayedPopularProducts"
        :key="product.id"
        :name="product.name"
        :category="getCategoryName(product.categoryId)"
        :image="product.image"
        :price="product.price"
        :rating="product.rating"
        :size="product.size"
        :discount="product.discount"
        @add-to-cart="() => handleAddToCart(product)"
      />
    </div>
  </div>
</template>

<script lang="ts">
import axios from 'axios'
import MenuComponent from './components/menuComponent.vue'
import CategoryComponent from './components/categoryComponent.vue'
import PromotionComponent from './components/promotionComponent.vue'
import ProductComponent from './components/productComponent.vue'

interface Category {
  id: number
  name: string
  group: string
}

interface Promotion {
  id: number
  title: string
  image: string
  url?: string
  color?: string
  buttonColor?: string
}

interface Product {
  id: number
  name: string
  categoryId: number
  image: string
  price: number
  rating: number
  size: string
  discount?: number
  group?: string
  isPopular?: boolean
}

export default {
  components: {
    CategoryComponent,
    PromotionComponent,
    MenuComponent,
    ProductComponent,
  },

  data() {
    return {
      categories: [] as Category[],
      promotions: [] as Promotion[],
      products: [] as Product[],
      groups: [] as string[],

      activeCategoryTab: 'All',
      activeProductTab: 'All',
    }
  },

  computed: {
    categoryTabs(): string[] {
      return ['All', ...this.groups]
    },
    productTabs(): string[] {
      return ['All', ...this.groups]
    },

    displayedCategories(): Category[] {
      if (this.activeCategoryTab === 'All') return this.categories.slice(0, 10)
      return this.categories.filter((c) => c.group === this.activeCategoryTab)
    },

    displayedPopularProducts(): Product[] {
      let filtered = this.products.filter((p) => p.isPopular)
      if (this.activeProductTab !== 'All') {
        filtered = filtered.filter((p) => p.group === this.activeProductTab)
      }
      return filtered.slice(0, 10)
    },
  },

  methods: {
    async fetchCategories() {
      try {
        const res = await axios.get<Category[]>('http://localhost:3000/api/categories')
        this.categories = res.data
      } catch (err) {
        console.error(err)
      }
    },

    async fetchPromotions() {
      try {
        const res = await axios.get<Promotion[]>('http://localhost:3000/api/promotions')
        this.promotions = res.data
      } catch (err) {
        console.error(err)
      }
    },

    async fetchProducts() {
      try {
        const res = await axios.get<Product[]>('http://localhost:3000/api/products')
        this.products = res.data
      } catch (err) {
        console.error(err)
      }
    },

    async fetchGroups() {
      try {
        const res = await axios.get<string[]>('http://localhost:3000/api/groups')
        this.groups = res.data
      } catch (err) {
        console.error(err)
      }
    },

    handleCategoryTabChange(tab: string) {
      this.activeCategoryTab = tab
    },

    handleProductTabChange(tab: string) {
      this.activeProductTab = tab
    },

    getCategoryName(id: number): string {
      const c = this.categories.find((cat) => cat.id === id)
      return c ? c.name : 'Unknown'
    },

    handleAddToCart(product: Product) {
      alert(`Added ${product.name} to cart!`)
    },
  },

  mounted() {
    this.fetchCategories()
    this.fetchPromotions()
    this.fetchProducts()
    this.fetchGroups()
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
.product-grid {
  display: grid;
  grid-template-columns: repeat(5, 1fr);
  gap: 25px;
  padding: 20px;
}
</style>
