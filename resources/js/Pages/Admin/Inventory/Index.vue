<template>
  <div class="container mt-4">
    <h1 class="mb-4">🗃 {{ shop.name }} – Inventory</h1>

    <Link :href="`/admin/shops/${shop.id}/products/create`" class="btn btn-primary mb-3">
      ➕ Add New Product
    </Link>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Stock</th>
          <th>Unit</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="product in products" :key="product.id">
          <td>{{ product.name }}</td>
          <td>₱{{ product.price.toFixed(2) }}</td>
          <td>{{ product.stock_quantity }}</td>
          <td>{{ product.unit }}</td>
          <td>
            <Link :href="`/admin/shops/${shop.id}/products/${product.id}/edit`" class="btn btn-sm btn-warning">✏️ Edit</Link>
            <button @click="deleteProduct(product.id)" class="btn btn-sm btn-danger ms-2">🗑 Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <Link :href="`/admin/shops`" class="btn btn-secondary mt-3">← Back to Shops</Link>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'
defineProps({ shop: Object, products: Array })

function deleteProduct(id) {
  if (confirm('Are you sure you want to delete this product?')) {
    router.delete(`/admin/shops/${shop.id}/products/${id}`)
  }
}
</script>
