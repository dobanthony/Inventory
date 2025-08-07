<!-- resources/js/Pages/Admin/Inventory/Index.vue -->
<template>
  <div class="container mt-4">
    <h2>Inventory - {{ shop.name }}</h2>
    <a :href="`/admin/shops/${shop.id}/inventory/create`" class="btn btn-primary my-3">Add Product</a>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th><th>Price</th><th>Stock</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.name }}</td>
          <td>₱{{ product.price }}</td>
          <td>{{ product.stock }}</td>
          <td>
            <a :href="`/admin/products/${product.id}/edit`" class="btn btn-sm btn-warning me-2">Edit</a>
            <button class="btn btn-sm btn-danger" @click="deleteProduct(product.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
defineProps({
  shop: Object,
  products: Array
})

function deleteProduct(id) {
  if (confirm('Are you sure?')) {
    router.delete(`/admin/products/${id}`)
  }
}
</script>
