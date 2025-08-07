<!-- resources/js/Pages/Admin/Inventory/Create.vue -->
<template>
  <div class="container mt-4">
    <h2>Add Product to {{ shop.name }}</h2>

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

      <button class="btn btn-success">Save</button>
      <a :href="`/admin/shops/${shop.id}/inventory`" class="btn btn-secondary ms-2">Cancel</a>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const props = defineProps({ shop: Object })

const form = useForm({
  name: '',
  description: '',
  price: '',
  stock: '',
  shop_id: props.shop.id,
})

function submit() {
  form.post('/admin/products')
}
</script>
