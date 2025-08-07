<!-- resources/js/Pages/Admin/Inventory/Edit.vue -->
<template>
  <div class="container mt-4">
    <h2>Edit Product: {{ product.name }}</h2>

    <form @submit.prevent="submit">
      <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input v-model="form.name" type="text" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea v-model="form.description" class="form-control" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input v-model="form.price" type="number" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Stock</label>
        <input v-model="form.stock" type="number" class="form-control" required>
      </div>

      <button class="btn btn-primary">Update</button>
      <a :href="`/admin/shops/${product.shop_id}/inventory`" class="btn btn-secondary ms-2">Cancel</a>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  product: Object
})

const form = useForm({
  name: props.product.name,
  description: props.product.description,
  price: props.product.price,
  stock: props.product.stock,
})

function submit() {
  form.put(`/admin/products/${props.product.id}`)
}
</script>
