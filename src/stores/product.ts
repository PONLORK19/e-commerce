import { defineStore } from 'pinia'
import axios from 'axios'

export const useProductStore = defineStore('product', {
  state: () => ({
    groups: [],
    categories: [],
    promotions: [],
    products: [],
  }),

  actions: {
    async fetchGroups() {
      const res = await axios.get('http://localhost:3000/api/groups')
      this.groups = res.data
    },

    async fetchCategories() {
      const res = await axios.get('http://localhost:3000/api/categories')
      this.categories = res.data
    },

    async fetchPromotions() {
      const res = await axios.get('http://localhost:3000/api/promotions')
      this.promotions = res.data
    },

    async fetchProducts() {
      const res = await axios.get('http://localhost:3000/api/products')
      this.products = res.data
    },

    async fetchAll() {
      await Promise.all([
        this.fetchGroups(),
        this.fetchCategories(),
        this.fetchPromotions(),
        this.fetchProducts(),
      ])
    },
  },
})
