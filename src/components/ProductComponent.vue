<template>
  <div class="product_list">
    <div class="product-card" v-for="product in productStore.products" :key="product.id">
      <!-- Hot badge (replace discount if needed) -->
      <div v-if="product.isHot" class="hot-badge">
        Hot
      </div>
      
      <!-- Discount badge (optional, if you want both) -->
      <div v-else-if="product.discountPercentage > 0" class="discount-badge">
        -{{ product.discountPercentage }}%
      </div>
      
      <!-- Product image -->
      <img :src="getImageUrl(product.image)" :alt="product.name" />
      
      <!-- Product details -->
      <div class="product-details">
        <!-- Brand name -->
        <div class="brand-name">{{ product.brand }}</div>
        
        <!-- Product name -->
        <h3 class="product-title">{{ product.name }}</h3>
        
        <!-- Rating -->
        <div class="rating">
          <span v-for="i in 5" :key="i" class="star" :class="{ 'filled': i <= Math.floor(product.rating) }">
            ★
          </span>
          <span class="rating-value">({{ product.rating }})</span>
        </div>
        
        <!-- Weight/size -->
        <div class="weight">{{ product.weight }}</div>
        
        <!-- Price section -->
        <div class="price-section">
          <span class="current-price">${{ product.price }}</span>
          <span v-if="product.originalPrice && product.originalPrice > product.price" class="original-price">${{ product.originalPrice }}</span>
        </div>
        
        <!-- Add button -->
        <button class="add-button">
          Add <span class="plus-sign">+</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { useProductStore } from '../stores/product'
import { onMounted } from 'vue'

export default {
  name: 'ProductsComponent',
  setup() {
    const productStore = useProductStore()

    onMounted(() => {
      productStore.fetchProducts()
    })

    const getImageUrl = (imageStr: string) => {
      try {
        const arr = JSON.parse(imageStr)
        return `http://localhost:3000/${arr[0]}`
      } catch {
        return ''
      }
    }

    return { productStore, getImageUrl }
  },
}
</script>

<style scoped>
.product_list {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  justify-content: center;
  padding: 20px;
}

.product-card {
  width: 280px;
  background-color: white;
  border: 1px solid #e0f0e0;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  transition: transform 0.2s ease;
  position: relative;
}

.product-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
}

/* Hot badge */
.hot-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: #f46a6a; /* Red for "Hot" */
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 14px;
  font-weight: bold;
  z-index: 1;
}

/* Discount badge (fallback if not hot) */
.discount-badge {
  position: absolute;
  top: 10px;
  left: 10px;
  background-color: #6ab77a;
  color: white;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 14px;
  font-weight: bold;
  z-index: 1;
}

/* Product image */
.product-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  object-position: center;
}

/* Product details container */
.product-details {
  padding: 16px;
}

/* Brand name */
.brand-name {
  color: #666;
  font-size: 14px;
  margin-bottom: 4px;
}

/* Product title */
.product-title {
  font-size: 16px;
  font-weight: 600;
  color: #2c3e50;
  margin: 8px 0 12px;
  line-height: 1.4;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Rating */
.rating {
  display: flex;
  align-items: center;
  margin-bottom: 8px;
}

.star {
  color: #ddd;
  font-size: 16px;
  margin-right: 2px;
}

.star.filled {
  color: #ffc107;
}

.rating-value {
  color: #666;
  font-size: 14px;
  margin-left: 8px;
}

/* Weight */
.weight {
  color: #666;
  font-size: 14px;
  margin-bottom: 16px;
}

/* Price section */
.price-section {
  display: flex;
  align-items: center;
  margin-bottom: 16px;
}

.current-price {
  color: #6ab77a;
  font-size: 20px;
  font-weight: bold;
  margin-right: 8px;
}

.original-price {
  color: #999;
  text-decoration: line-through;
  font-size: 16px;
}

/* Add button */
.add-button {
  background-color: #e8f8ee;
  color: #6ab77a;
  border: none;
  border-radius: 6px;
  padding: 8px 16px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.2s;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 6px;
}

.add-button:hover {
  background-color: #d0f0d8;
}

.plus-sign {
  font-size: 18px;
  font-weight: bold;
}
</style>